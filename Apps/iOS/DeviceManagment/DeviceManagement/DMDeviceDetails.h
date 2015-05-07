//
//  DMDeviceDetails.h
//  DeviceManagement
//
//  Created by Madhura Shettar on 5/5/15.
//  Copyright (c) 2015 Tabrez. All rights reserved.
//

#import <Foundation/Foundation.h>

@interface DMDeviceDetails : NSObject

@property (strong, nonatomic) NSString *deviceId;
@property (strong, nonatomic) NSString *type;
@property (strong, nonatomic) NSString *imei;
@property (strong, nonatomic) NSString *accessoryInfo;
@property (strong, nonatomic) NSString *createdAt;
@property (strong, nonatomic) NSString *employeeId;
@property (strong, nonatomic) NSString *identifier;
@property (strong, nonatomic) NSString *make;
@property (strong, nonatomic) NSString *name;
@property (strong, nonatomic) NSString *os;
@property (strong, nonatomic) NSString *updatedAt;
@property (strong, nonatomic) NSString *userId;
@property (strong, nonatomic) NSString *firstName;

- (void)parseDeviceDetailsFromResponse:(NSDictionary *)userData;

@end



//responseData =     {
//    IMEI = 2431442;
//    accessoryinfo = sdadsadas;
//    "created_at" = "2014-12-12 00:00:00";
//    "device_id" = 1;
//    "employee_id" = 111;
//    "first_name" = Test1;
//    id = 22;
//    "last_name" = "";
//    make = sdaadsdsa;
//    name = dssdsad;
//    os = sassa;
//    type = iphone;
//    "updated_at" = "<null>";
//    "user_id" = 1;
//};
