//
//  DeviceOwnerDetailsVC.h
//  DeviceManagement
//
//  Created by Tabrez on 18/07/14.
//  Copyright (c) 2014 Tabrez. All rights reserved.
//

#import <UIKit/UIKit.h>
#import "Delegates.h"

@interface DeviceOwnerDetailsVC : UIViewController < DeviceReassignDelegate >

@property (weak, nonatomic) IBOutlet UILabel *deviceNumberLabel;
@property (weak, nonatomic) IBOutlet UILabel *deviceNameLabel;
@property (weak, nonatomic) IBOutlet UILabel *ownerNameLabel;
@property (weak, nonatomic) IBOutlet UIButton *reassignButton;

- (IBAction)reassignButtonClicked:(id)sender;

@end
