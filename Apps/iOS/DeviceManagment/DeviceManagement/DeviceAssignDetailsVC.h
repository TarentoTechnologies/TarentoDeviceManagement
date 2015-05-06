//
//  DeviceAssignDetailsVC.h
//  DeviceManagement
//
//  Created by Tabrez on 18/07/14.
//  Copyright (c) 2014 Tabrez. All rights reserved.
//

#import <UIKit/UIKit.h>
#import "Delegates.h"

@class DeviceInfo;
@class DeviceDetailsApi;



@interface DeviceAssignDetailsVC : UIViewController

@property (weak, nonatomic) IBOutlet UILabel *deviceNumberLabel;
@property (weak, nonatomic) IBOutlet UILabel *deviceNameLabel;
@property (weak, nonatomic) IBOutlet UITextField *ownerPinTextField;
@property (weak, nonatomic) IBOutlet UITextField *changedOwnerIdTextField;
@property (weak, nonatomic) IBOutlet UITextField *changedOwnerPinTextField;
@property (weak, nonatomic) IBOutlet UIButton *assignButton;
@property (weak, nonatomic) IBOutlet UILabel *ownerNameLabel;

@property (weak, nonatomic) UITextField *activeTextField;
@property (nonatomic) NSInteger textFieldIndex;

//@property (strong, nonatomic) DeviceInfo *deviceInfo;

@property (strong, nonatomic) DeviceDetailsApi *deviceInfo;

@property (weak, nonatomic) id < DeviceReassignDelegate > reassignDelegate;



- (IBAction)assignButtonClicked:(id)sender;

@end
