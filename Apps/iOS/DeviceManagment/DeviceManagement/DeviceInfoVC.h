//
//  DeviceInfoVC.h
//  DeviceManagement
//
//  Created by Tabrez on 18/07/14.
//  Copyright (c) 2014 Tabrez. All rights reserved.
//

#import <UIKit/UIKit.h>

@interface DeviceInfoVC : UIViewController

@property (weak, nonatomic) IBOutlet UITextField *deviceNumberTextField;
@property (weak, nonatomic) IBOutlet UITextField *deviceTypeTextField;
@property (weak, nonatomic) IBOutlet UITextField *adminPinTextField;
@property (weak, nonatomic) IBOutlet UIButton *submitButton;

@property (weak, nonatomic) IBOutlet UIToolbar *toolBar;
@property (weak, nonatomic) IBOutlet UIBarButtonItem *previousBarButton;
@property (weak, nonatomic) IBOutlet UIBarButtonItem *nextBarButton;
@property (weak, nonatomic) IBOutlet UIBarButtonItem *doneBarButton;

@property (weak, nonatomic) UITextField *activeTextField;
@property (nonatomic) NSInteger textFieldIndex;

@property(nonatomic, retain) UIColor *barTintColor;


- (IBAction)submitButtonClicked:(id)sender;

- (IBAction)previousBarButtonClicked:(id)sender;
- (IBAction)nextBarButtonClicked:(id)sender;
- (IBAction)doneBarButtonClicked:(id)sender;

@end
