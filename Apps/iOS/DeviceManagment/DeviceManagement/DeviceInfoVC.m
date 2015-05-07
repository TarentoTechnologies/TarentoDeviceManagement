//
//  DeviceInfoVC.m
//  DeviceManagement
//
//  Created by Tabrez on 18/07/14.
//  Copyright (c) 2014 Tabrez. All rights reserved.
//

#import "DeviceInfoVC.h"
#import "DeviceDetailsApi.h"
#import "DeviceOwnerDetailsVC.h"
#import "DeviceTrackerApi.h"
#import "GetDeviceInfo.h"
#import  "DeviceInfo.h"
#import "DataModel.h"
@interface DeviceInfoVC ()

@property (strong, nonatomic) NSMutableArray *textFieldsArray;

@end

@implementation DeviceInfoVC


@synthesize deviceNumberTextField;
@synthesize deviceTypeTextField;
@synthesize adminPinTextField;
@synthesize submitButton;
@synthesize toolBar;
@synthesize previousBarButton;
@synthesize nextBarButton;
@synthesize doneBarButton;
@synthesize activeTextField;
@synthesize textFieldIndex;
@synthesize textFieldsArray;


#define NUMBER_OF_TEXTFILEDS 3


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


- (void)viewWillAppear:(BOOL)animated {
    [super viewWillAppear:animated];
}


- (void)viewDidAppear:(BOOL)animated {
    [super viewDidAppear:animated];
    if ([self isdeviceDetailsPresent]) {
        [self showDeviceDetailsScreen];
    }
}


- (void)initializeView {
    UIEdgeInsets insets = UIEdgeInsetsMake(4, 4, 4, 4);
    
    [self.submitButton setBackgroundImage:[[UIImage imageNamed:@"orange_scalable.png"] resizableImageWithCapInsets:insets] forState:UIControlStateNormal];
    
    self.deviceNumberTextField.placeholder = [NSString localizedValueForKey:@"device_Number"];
    self.deviceTypeTextField.placeholder = [NSString localizedValueForKey:@"device_Type"];
    self.adminPinTextField.placeholder = [NSString localizedValueForKey:@"admin_Pin"];
    
    self.toolBar.alpha = 0.0f;
    self.textFieldsArray = [[NSMutableArray alloc] initWithObjects:deviceNumberTextField,deviceTypeTextField, adminPinTextField, nil];
}


- (void)didReceiveMemoryWarning {
    [super didReceiveMemoryWarning];
    // Dispose of any resources that can be recreated.
}


- (BOOL)validateData {
    BOOL success = YES;
    
    if (!deviceNumberTextField.text.length) {
        // Text field is empty..
        [[AppUtility sharedInstance] showAlertWithTitle:@"" message:[NSString localizedValueForKey:@"device_Number_Empty_Error"]];
        success = NO;
    }
    else if ([[AppUtility sharedInstance] isNonNumericCharsPresent:deviceNumberTextField.text]) {
        // text field contains non numeric characters..
        [[AppUtility sharedInstance] showAlertWithTitle:@"" message:[NSString localizedValueForKey:@"device_Number_Char_Validation_Error"]];
        success = NO;
    }
    else if (deviceTypeTextField.text.length < MIN_DEVICE_TYPE_LENGTH) {
        [[AppUtility sharedInstance] showAlertWithTitle:@"" message:[NSString localizedValueForKey:@"device_Type_Empty_Error"]];
        success = NO;
    }
    
    return success;
}


- (IBAction)submitButtonClicked:(id)sender {
    BOOL success = [self validateData];
    
    if (success) {
        [self callDeviceDetailsApi];
    }
}


- (void)showDeviceDetailsScreen {
    [self performSegueWithIdentifier:@"ownerDetails" sender:self];
}


- (void)callDeviceDetailsApi {
    __block GetDeviceInfo *deviceInfoApi = [GetDeviceInfo new];
    
    deviceInfoApi.appId = @1;
    deviceInfoApi.apiToken =@"111111";
    deviceInfoApi.deviceId =deviceNumberTextField.text;
    deviceInfoApi.type = deviceTypeTextField.text;
    
    [[WebService sharedInstance] postRequest:deviceInfoApi andCallback:^(APIBase *apiBase, id JSON,NSError *error) {
        
        deviceInfoApi = (GetDeviceInfo *)apiBase;
        
        if (nil == error && nil == deviceInfoApi.errormessage) {
            
            [[DataModel sharedInstance] storeDeviceDetils:deviceInfoApi.deviceDetails];
            [self showDeviceDetailsScreen];
        }
        else {
            [deviceInfoApi displayError];
        }
    }];
}


- (IBAction)previousBarButtonClicked:(id)sender {
    if(textFieldIndex > 0) {
		textFieldIndex--;
		UITextField *textField = (UITextField *)[textFieldsArray objectAtIndex:textFieldIndex];
		[textField becomeFirstResponder];
	}
}


- (IBAction)nextBarButtonClicked:(id)sender {
    if(textFieldIndex < (NUMBER_OF_TEXTFILEDS - 1)) {
		textFieldIndex++;
		UITextField *textField = (UITextField *)[textFieldsArray objectAtIndex:textFieldIndex];
		[textField becomeFirstResponder];
	}
}


- (IBAction)doneBarButtonClicked:(id)sender {
    [self showNormalView];
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
    [self enableToolBarButtons];
    
    if (IS_IPHONE4) {
        [UIView animateWithDuration:0.3 animations:^{
            CGRect frame = self.view.frame;
            frame.origin.y = - (50 + (textFieldIndex * 35)); // write comment..
            self.view.frame = frame;
        }];
    }
}


- (BOOL)textFieldShouldReturn:(UITextField *)textField {
    if(textFieldIndex < (NUMBER_OF_TEXTFILEDS - 1)) {
		textFieldIndex++;
		UITextField *textField = (UITextField *)[textFieldsArray objectAtIndex:textFieldIndex];
		[textField becomeFirstResponder];
	}
    else {
       [self showNormalView];
    }
    
	return YES;
}


#pragma mark -
#pragma mark - Helper functions

/**
 * enables toolbar and it's barbuttons according to textfield.
 */
- (void)enableToolBarButtons {
    if (!textFieldIndex) {
        self.previousBarButton.enabled = NO;
        self.nextBarButton.enabled = YES;
    }
    else if (textFieldIndex == (NUMBER_OF_TEXTFILEDS - 1)) {
        self.previousBarButton.enabled = YES;
        self.nextBarButton.enabled = NO;
    }
    else {
        self.previousBarButton.enabled = YES;
        self.nextBarButton.enabled = YES;
    }
    
    //self.toolBar.alpha = 1.0f;
    //activeTextField.inputAccessoryView = self.toolBar;
    
    self.toolBar.alpha = 0.0f;
    activeTextField.inputAccessoryView = nil;
}


/**
 * resigns textfiled, hides toolbar and brings view to normal.
 */
- (void)showNormalView {
    activeTextField.inputAccessoryView = nil;
    self.toolBar.alpha = 0.0f;
    [[AppUtility sharedInstance] disableHighLightOfTextField:activeTextField];
    [activeTextField resignFirstResponder];
    
    [UIView animateWithDuration:0.3 animations:^{
        CGRect frame = self.view.frame;
        frame.origin.y = 0.0;
        self.view.frame = frame;
    }];
}


#pragma mark -

- (BOOL)isdeviceDetailsPresent {
    
    DeviceInfo *info = [[DataModel sharedInstance] deviceDetails];
    return (info != nil);
}


#pragma mark -

- (void)prepareForSegue:(UIStoryboardSegue *)segue sender:(id)sender {
    ;
}


@end
