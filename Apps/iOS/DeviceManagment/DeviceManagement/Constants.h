//
//  Constants.h
//  DeviceManagement
//
//  Created by Tabrez on 18/07/14.
//  Copyright (c) 2014 Tabrez. All rights reserved.
//

#ifndef DeviceManagement_Constants_h
#define DeviceManagement_Constants_h

#define DBLog(fmt, ...)  if (1) { NSLog((@"[DeviceManagement] %s/%d " fmt), __PRETTY_FUNCTION__, __LINE__, ##__VA_ARGS__); }

#define RGBCOLOR(r,g,b) [UIColor colorWithRed:(r)/255.0f green:(g)/255.0f blue:(b)/255.0f alpha:1]


#define CURRENTDEVICENUMBER @"currentDeviceNumber"
#define ADMINPINCODE @"adminPinCode"
#define DEVICETYPE @"deviceType"
#define CURRENTDEVICEDETAILS @"currentDeiveDetails"


#define IS_IOS7 (NSFoundationVersionNumber > NSFoundationVersionNumber_iOS_6_1 ? YES : NO)
#define IOS7_OFFSET (IS_IOS7 ? 20 : 0)


#define CH_SKYBLUE_COLOR [UIColor colorWithRed:0.659 green:0.91 blue:1 alpha:1.0]

#define IS_IPHONE4 (([[UIScreen mainScreen] bounds].size.height-480)?NO:YES)

#define MAX_PIN_CODE_DIGITS 3

#define API_TESTING 0

#define MIN_DEVICE_TYPE_LENGTH 4

#endif
