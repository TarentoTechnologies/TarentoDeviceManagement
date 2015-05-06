//
//  AppUtility.m
//  DeviceManagement
//
//  Created by Tabrez on 21/07/14.
//  Copyright (c) 2014 Tabrez. All rights reserved.
//

#import "AppUtility.h"

@implementation AppUtility

static AppUtility *sharedInstance = nil;


+ (AppUtility*)sharedInstance
{
    static dispatch_once_t sharedInstanceToken;
    dispatch_once(&sharedInstanceToken, ^{
        sharedInstance = [[AppUtility alloc] init];
    });
    return sharedInstance;
}


- (BOOL)isNonNumericCharsPresent:(NSString *)sourceString
{
    BOOL result = NO;
    
    if (nil == sourceString) {
        return result;
    }
    
//    NSString *stricterFilterString = @"[0-9]+"; //here + is for one or more numerals(use * for zero or more numerals)
    
    NSString *stricterFilterString = @"^[0-9]+$";
    
    NSString *regEx =  stricterFilterString;
    NSPredicate *numericTest = [NSPredicate predicateWithFormat:@"SELF MATCHES %@", regEx];
    result = [numericTest evaluateWithObject:sourceString];
    
    return !result;
}


- (void)highLightTextField:(UITextField *)textfield
                 withColor:(UIColor *)color
{
    textfield.layer.cornerRadius = 8.0f;
    textfield.layer.borderColor = color.CGColor;
    textfield.layer.borderWidth = 2.0f;
}


- (void)disableHighLightOfTextField:(UITextField *)textfield
{
    textfield.layer.cornerRadius = 0.0f;
    textfield.layer.borderWidth = 0.0f;
    textfield.layer.borderColor = [UIColor clearColor].CGColor;
}


- (void)showAlertWithTitle:(NSString *)title
                   message:(NSString *)messageString
{
    UIAlertView *alertView = [[UIAlertView alloc] initWithTitle:title message:messageString delegate:nil cancelButtonTitle:@"OK" otherButtonTitles:nil];
    [alertView show];
}


- (void)showAlertWithTitle:(NSString *)title
                   message:(NSString *)messageString
                  delegate:(id)delegate
                       tag:(int)tag
         cancelButtonTitle:(NSString *)cancelTitle
          otherButtonTitle:(NSString *)otherTitle
{
    UIAlertView *alertView = [[UIAlertView alloc] initWithTitle:title message:messageString delegate:delegate cancelButtonTitle:cancelTitle otherButtonTitles:otherTitle, nil];
    alertView.tag = tag;
    [alertView show];
}


@end
