//
//  DeviceAssignDetailsVC.m
//  DeviceManagement
//
//  Created by Tabrez on 18/07/14.
//  Copyright (c) 2014 Tabrez. All rights reserved.
//

#import "DeviceAssignDetailsVC.h"
#import "DeviceInfo.h"
#import "DeviceDetailsApi.h"
#import "DeviceAssignApi.h"
#import "DeviceTransferApi.h"
#import "DataModel.h"

@interface DeviceAssignDetailsVC ()

@property (strong, nonatomic) NSMutableArray *textFieldsArray;

@end


@implementation DeviceAssignDetailsVC


@synthesize deviceNumberLabel;
@synthesize deviceNameLabel;
@synthesize ownerPinTextField;
@synthesize changedOwnerIdTextField;
@synthesize changedOwnerPinTextField;
@synthesize assignButton;
@synthesize activeTextField;
@synthesize textFieldIndex;
@synthesize textFieldsArray;
@synthesize ownerNameLabel;
@synthesize reassignDelegate;


- (id)initWithNibName:(NSString *)nibNameOrNil bundle:(NSBundle *)nibBundleOrNil {
    self = [super initWithNibName:nibNameOrNil bundle:nibBundleOrNil];
    
    if (self) {
        // Custom initialization
    }
    
    return self;
}


- (void)viewDidLoad {
    [super viewDidLoad];
	// Do any additional setup after loading the view.
    [self initializeView];
}


- (void)initializeView {
    UIEdgeInsets insets = UIEdgeInsetsMake(4, 4, 4, 4);
    
    [self.assignButton setBackgroundImage:[[UIImage imageNamed:@"orange_scalable.png"] resizableImageWithCapInsets:insets] forState:UIControlStateNormal];
    
    self.deviceNameLabel.textColor = [UIColor deviceNameColor];
    self.deviceNumberLabel.textColor = [UIColor deviceNumberColor];
    self.ownerNameLabel.textColor = [UIColor deviceOwnerNameColor];
    
    self.ownerPinTextField.placeholder = [NSString localizedValueForKey:@"current_Owner_Pin"];
    self.changedOwnerIdTextField.placeholder = [NSString localizedValueForKey:@"new_Owner_Id"];
    self.changedOwnerPinTextField.placeholder = [NSString localizedValueForKey:@"new_Owner_Pin"];
    
    self.textFieldsArray = [[NSMutableArray alloc] initWithObjects:ownerPinTextField,changedOwnerIdTextField, changedOwnerPinTextField, nil];
    
    [self showDetails];
}


- (void)showDetails {
    DeviceInfo *info =[[DataModel sharedInstance]deviceDetails];
    
    deviceNumberLabel.text = info.deviceId;
    ownerNameLabel.text = info.firstName;
    deviceNameLabel.text = info.name;
}


- (void)didReceiveMemoryWarning {
    [super didReceiveMemoryWarning];
    // Dispose of any resources that can be recreated.
}


- (DeviceInfo *)deviceInfo {
    return [[DataModel sharedInstance] deviceDetails];
}


- (IBAction)assignButtonClicked:(id)sender {
    BOOL success = [self validateData];
    if (success) {
        [self callReassignApi];
    }
}


- (BOOL)validateData {
    BOOL success = YES;
    
    if (self.ownerPinTextField.text.length < MAX_PIN_CODE_DIGITS) {
        // invalid owner pin..
        success = NO;
        
        [[AppUtility sharedInstance] showAlertWithTitle:@"" message:[NSString localizedValueForKey:@"owner_Pin_Validation_Error"]];
    }
    else if (!self.changedOwnerIdTextField.text.length) {
        // invalid new owner id
        success = NO;
        
        [[AppUtility sharedInstance] showAlertWithTitle:@"" message:[NSString localizedValueForKey:@"new_Owner_Employee_Id_Error"]];
    }
    else if (self.changedOwnerPinTextField.text.length < MAX_PIN_CODE_DIGITS) {
        // invalid new owner pin
        success = NO;
        
        [[AppUtility sharedInstance] showAlertWithTitle:@"" message:[NSString localizedValueForKey:@"new_Owner_Pin_Validation_Error"]];
    }
    
    return success;
}


- (void)callReassignApi {
    __block DeviceTransferApi *apiObject = [[DeviceTransferApi alloc] init];
    
    DeviceInfo *info = [self deviceInfo];
    
    apiObject.appId = @1;
    apiObject.apiToken = @"111111";
    apiObject.oldOwnerPin = self.ownerPinTextField.text;
    apiObject.oldOwnerIdentifier = info.identifier;
    apiObject.ownerPin = self.changedOwnerPinTextField.text;
    apiObject.ownerIdentifier = self.changedOwnerIdTextField.text;
    apiObject.imei = info.imei;
    apiObject.deviceId = info.deviceId;
    apiObject.type = self.typeTextField.text;

    [[WebService sharedInstance] postRequest:apiObject andCallback:^(APIBase *apiBase, id JSON, NSError *error) {
        
        apiObject = (DeviceTransferApi *)apiBase;
        
        if (nil == error && nil == apiObject.errormessage) {
            
            [[DataModel sharedInstance] storeDeviceDetils:apiObject.details];
            if ([self.reassignDelegate respondsToSelector:@selector(deviceReassignedToNewUser)]) {
                [reassignDelegate deviceReassignedToNewUser];
            }
            [self popBackToDetails];
        }
        else {
            [apiObject displayError];
        }
    }];
}


- (void)popBackToDetails {
    [self.navigationController popViewControllerAnimated:YES];
}


#pragma mark -
#pragma mark - text field delegates...


- (BOOL)textFieldShouldBeginEditing:(UITextField *)textField {
	BOOL edit = YES;
	return edit;
}


- (void)textFieldDidBeginEditing:(UITextField *)textField {
    [[AppUtility sharedInstance] disableHighLightOfTextField:activeTextField];
    textFieldIndex = [textField tag];
    activeTextField = textField;
    [[AppUtility sharedInstance] highLightTextField:activeTextField withColor:CH_SKYBLUE_COLOR];
    
    NSInteger padding = 0;
    NSInteger height = 30;
    
    if (IS_IPHONE4) {
        padding = 40;
        height = 35;
    }
    
    [UIView animateWithDuration:0.3 animations:^{
        CGRect frame = self.view.frame;
        frame.origin.y = - (padding + (textFieldIndex * height)); // write comment..
        self.view.frame = frame;
    }];
}


- (BOOL)textFieldShouldReturn:(UITextField *)textField {
    if(textFieldIndex < (textFieldsArray.count - 1)) {
		textFieldIndex++;
		UITextField *textField = (UITextField *)[textFieldsArray objectAtIndex:textFieldIndex];
		[textField becomeFirstResponder];
	}
    else {
        [self showNormalView];
    }
    
	return YES;
}


- (void)showNormalView {
    activeTextField.inputAccessoryView = nil;
    [[AppUtility sharedInstance] disableHighLightOfTextField:activeTextField];
    [activeTextField resignFirstResponder];
    
    [UIView animateWithDuration:0.3 animations:^{
        CGRect frame = self.view.frame;
        frame.origin.y = 0.0;
        self.view.frame = frame;
    }];
}


@end
