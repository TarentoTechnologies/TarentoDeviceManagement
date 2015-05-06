//
//  DeviceOwnerDetailsVC.h
//  DeviceManagement
//
//  Created by Tabrez on 18/07/14.
//  Copyright (c) 2014 Tabrez. All rights reserved.
//

#import <UIKit/UIKit.h>
#import "Delegates.h"

@class DeviceDetailsApi;
@class DeviceTransferApi;
@class DMDeviceDetails;
@class DeviceInfo;
@interface DeviceOwnerDetailsVC : UIViewController < DeviceReassignDelegate >

@property (weak, nonatomic) IBOutlet UILabel *deviceNumberLabel;
@property (weak, nonatomic) IBOutlet UILabel *deviceNameLabel;
@property (weak, nonatomic) IBOutlet UILabel *ownerNameLabel;
@property (weak, nonatomic) IBOutlet UIButton *reassignButton;
@property (strong, nonatomic) DeviceDetailsApi *detailsApi;
@property (strong, nonatomic) DeviceTransferApi *transferApi;
@property (strong, nonatomic) DMDeviceDetails *deviceDetails;

- (IBAction)reassignButtonClicked:(id)sender;

@end
