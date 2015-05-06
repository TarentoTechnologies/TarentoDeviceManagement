//
//  AppUtility.h
//  DeviceManagement
//
//  Created by Tabrez on 21/07/14.
//  Copyright (c) 2014 Tabrez. All rights reserved.
//

#import <Foundation/Foundation.h>

@interface AppUtility : NSObject


+ (AppUtility*)sharedInstance;


- (BOOL)isNonNumericCharsPresent:(NSString *)sourceString;


- (void)highLightTextField:(UITextField *)textfield
                 withColor:(UIColor *)color;

- (void)disableHighLightOfTextField:(UITextField *)textfield;


- (void)showAlertWithTitle:(NSString *)title
                   message:(NSString *)messageString;


- (void)showAlertWithTitle:(NSString *)title
                   message:(NSString *)messageString
                  delegate:(id)delegate
                       tag:(int)tag
         cancelButtonTitle:(NSString *)cancelTitle
          otherButtonTitle:(NSString *)otherTitle;

@end
