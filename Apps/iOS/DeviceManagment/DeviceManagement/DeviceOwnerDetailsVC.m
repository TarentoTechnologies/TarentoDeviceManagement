//
//  DeviceOwnerDetailsVC.m
//  DeviceManagement
//
//  Created by Tabrez on 18/07/14.
//  Copyright (c) 2014 Tabrez. All rights reserved.
//

#import "DeviceOwnerDetailsVC.h"
#import "DeviceDetailsApi.h"
#import "DeviceAssignDetailsVC.h"
#import "DeviceInfo.h"
#import "DataModel.h"
#import "DeviceTransferApi.h"
#import "DMDeviceDetails.h"

@interface DeviceOwnerDetailsVC ()

@end


@implementation DeviceOwnerDetailsVC


@synthesize deviceNumberLabel;
@synthesize deviceNameLabel;
@synthesize ownerNameLabel;
@synthesize reassignButton;
@synthesize detailsApi;
@synthesize transferApi;


- (id)initWithNibName:(NSString *)nibNameOrNil bundle:(NSBundle *)nibBundleOrNil
{
    self = [super initWithNibName:nibNameOrNil bundle:nibBundleOrNil];
    
    if (self) {
        // Custom initialization
    }
    
    return self;
}


- (void)viewDidLoad
{
    [super viewDidLoad];
	// Do any additional setup after loading the view.
    [self initalizeDeviceDetails];
    [self initializeView];
//    
//    if (nil != transferApi) {
//        [self showDeviceDetails];
//    }
}

- (void)initalizeDeviceDetails {
    
DeviceInfo *info = [[DataModel sharedInstance] deviceDetails];
    
    self.deviceDetails = [[DMDeviceDetails alloc] init];
    
    self.deviceDetails.name = info.name;
    self.deviceDetails.identifier = info.identifier;
    
    [self showDeviceDetails];
}


- (void)initializeView
{
    [self hideBackButton];
    
    UIEdgeInsets insets = UIEdgeInsetsMake(4, 4, 4, 4);
    
    [self.reassignButton setBackgroundImage:[[UIImage imageNamed:@"orange_scalable.png"] resizableImageWithCapInsets:insets] forState:UIControlStateNormal];
    
    self.deviceNameLabel.textColor = [UIColor deviceNameColor];
    self.deviceNumberLabel.textColor = [UIColor deviceNumberColor];
    self.ownerNameLabel.textColor = [UIColor deviceOwnerNameColor];
}


- (void)showDeviceDetails
{
   // if (API_TESTING) {
//        self.deviceNameLabel.text = @"iPad Mini";
//        self.deviceNumberLabel.text = @"023";
//        self.ownerNameLabel.text = @"Venkatesan";
        self.deviceNameLabel.text = self.deviceDetails.name;
        self.deviceNumberLabel.text = self.deviceDetails.identifier;
           return;
 //   }
    
//    DeviceDetailsApi *detailsApi = [[NSUserDefaults standardUserDefaults] objectForKey:CURRENTDEVICEDETAILS];
    
    if (nil != self.detailsApi) {
        self.deviceNameLabel.text = detailsApi.asset;
        self.ownerNameLabel.text = detailsApi.employee_name;
        
        NSArray *assetArray = [detailsApi.asset componentsSeparatedByString:@"/"];
        if (assetArray.count) {
            self.deviceNumberLabel.text = [assetArray lastObject];
        }
    }
}


- (void)viewDidAppear:(BOOL)animated
{
    [super viewDidAppear:animated];
}


- (void)reassignToOtherMemberCallDeviceDetailsApi
{
//    NSString *deviceNumber = [[NSUserDefaults standardUserDefaults] objectForKey:CURRENTDEVICENUMBER];
//    NSString *adminPin = [[NSUserDefaults standardUserDefaults] objectForKey:ADMINPINCODE];
    
    __block DeviceTransferApi *apiObject = [[DeviceTransferApi alloc] init];

    apiObject.appId = @1;
    apiObject.apiToken = @"111111";
    apiObject.oldOwnerPin = @"123";
    apiObject.ownerIdentifier = @"114";
    apiObject.ownerPin = @"111";
    apiObject.oldOwnerIdentifier =@"111";
    apiObject.deviceId =@"1";
    

//    apiObject.adminPin = adminPi;
    
    if (API_TESTING) {
        [self showDeviceDetails];
        return;
    }

    
    [[WebService sharedInstance] postRequest:apiObject andCallback:^(APIBase *apiBase, id JSON, NSError *error) {
        
        apiObject = (DeviceTransferApi *)apiBase;
        
        if (nil == error && nil == apiBase.errormessage) {
//            [[NSUserDefaults standardUserDefaults] setObject:transferApi forKey:CURRENTDEVICEDETAILS];
            
            [self showDeviceDetails];
        }
        else {
            [apiBase displayError];
        }
    }];
}


//- (void)reassignToOtherMemberCallDeviceDetailsApi
//{
//    NSString *deviceNumber = [[NSUserDefaults standardUserDefaults] objectForKey:CURRENTDEVICENUMBER];
//    NSString *adminPin = [[NSUserDefaults standardUserDefaults] objectForKey:ADMINPINCODE];
//    
//    __block DeviceDetailsApi *apiObject = [[DeviceDetailsApi alloc] init];
//    
//    
//    apiObject.appId
//    apiObject.deviceNumber = deviceNumberLabel.text;
//    //    apiObject.adminPin = adminPi;
//    
//    [[WebService sharedInstance] postRequest:apiObject andCallback:^(APIBase *apiBase, id JSON, NSError *error) {
//        
//        apiObject = (DeviceDetailsApi *)apiBase;
//        
//        if (nil == error && nil == apiBase.errormessage) {
//            [[NSUserDefaults standardUserDefaults] setObject:detailsApi forKey:CURRENTDEVICEDETAILS];
//            
//            [self showDeviceDetails];
//        }
//        else {
//            [apiBase displayError];
//        }
//    }];
//}
//
//
- (void)hideBackButton
{
    self.navigationItem.leftBarButtonItem = nil;
    self.navigationItem.hidesBackButton = YES;
}


- (void)didReceiveMemoryWarning
{
    [super didReceiveMemoryWarning];
    // Dispose of any resources that can be recreated.
}


- (IBAction)reassignButtonClicked:(id)sender
{
    [self reassignToOtherMemberCallDeviceDetailsApi];
    [self performSegueWithIdentifier:@"assignDetails" sender:self];
}


- (DeviceInfo *)deviceDetailsObject
{
    DeviceInfo *info = [[DeviceInfo alloc] init];
   
    
    return info;
}


#pragma mark - DeviceReassignDelegate

- (void)DeviceReassignedToNewUser:(DeviceTransferApi *)details
{
//    self.detailsApi.employee_id = details.employee_id;
//    self.detailsApi.employee_name = details.employee_name;
    
    self.transferApi = details;
    
    [self showDeviceDetails];
}


#pragma mark -

- (void)prepareForSegue:(UIStoryboardSegue *)segue sender:(id)sender
{
    DeviceAssignDetailsVC *assignDetailVC = (DeviceAssignDetailsVC *)segue.destinationViewController;
    //assignDetailVC.deviceInfo = [self deviceDetailsObject];
    assignDetailVC.reassignDelegate = self;
    assignDetailVC.deviceInfo = self.detailsApi;
}


@end
