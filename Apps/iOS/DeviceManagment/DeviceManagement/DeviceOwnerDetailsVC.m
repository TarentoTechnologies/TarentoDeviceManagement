//
//  DeviceOwnerDetailsVC.m
//  DeviceManagement
//
//  Created by Tabrez on 18/07/14.
//  Copyright (c) 2014 Tabrez. All rights reserved.
//

#import "DeviceOwnerDetailsVC.h"
#import "DeviceAssignDetailsVC.h"
#import "DeviceInfo.h"
#import "DataModel.h"

@interface DeviceOwnerDetailsVC ()

@end


@implementation DeviceOwnerDetailsVC


@synthesize deviceNumberLabel;
@synthesize deviceNameLabel;
@synthesize ownerNameLabel;
@synthesize reassignButton;


- (id)initWithNibName:(NSString *)nibNameOrNil bundle:(NSBundle *)nibBundleOrNil
{
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
    [self showDeviceDetails];
}


- (void)initializeView {
    UIEdgeInsets insets = UIEdgeInsetsMake(4, 4, 4, 4);
    
    [self.reassignButton setBackgroundImage:[[UIImage imageNamed:@"orange_scalable.png"] resizableImageWithCapInsets:insets] forState:UIControlStateNormal];
    
    self.deviceNameLabel.textColor = [UIColor deviceNameColor];
    self.deviceNumberLabel.textColor = [UIColor deviceNumberColor];
    self.ownerNameLabel.textColor = [UIColor deviceOwnerNameColor];
}


- (void)showDeviceDetails {
    
    DeviceInfo *info = [[DataModel sharedInstance] deviceDetails];
    self.deviceNameLabel.text = info.name;
    self.deviceNumberLabel.text = info.identifier;
    self.ownerNameLabel.text = info.firstName;
}

- (void)viewWillAppear:(BOOL)animated {
    [super viewWillAppear:animated];
    [self hideBackButton];
}

- (void)viewDidAppear:(BOOL)animated {
    [super viewDidAppear:animated];
}


- (void)hideBackButton {
    self.navigationItem.hidesBackButton = YES;
    self.navigationItem.leftBarButtonItem = nil;
}


- (void)didReceiveMemoryWarning {
    [super didReceiveMemoryWarning];
    // Dispose of any resources that can be recreated.
}


- (IBAction)reassignButtonClicked:(id)sender {
    [self performSegueWithIdentifier:@"assignDetails" sender:self];
}


- (DeviceInfo *)deviceDetailsObject {
    DeviceInfo *info = [[DeviceInfo alloc] init];
    return info;
}


#pragma mark -
#pragma mark - DeviceReassignDelegate


- (void)deviceReassignedToNewUser {
    [self showDeviceDetails];
}


#pragma mark -


- (void)prepareForSegue:(UIStoryboardSegue *)segue sender:(id)sender {
    DeviceAssignDetailsVC *assignDetailVC = (DeviceAssignDetailsVC *)segue.destinationViewController;
    assignDetailVC.reassignDelegate = self;
}


@end
