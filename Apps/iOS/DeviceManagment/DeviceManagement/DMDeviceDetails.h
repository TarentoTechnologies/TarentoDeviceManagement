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

@end


//responseData =     {
//    IMEI = dsjdjdjasjdsajdsa;
//    accessoryinfo = ssdjsaddjsa;
//    "created_at" = "0000-00-00 00:00:00";
//    "device_id" = 1111;
//    "employee_id" = "<null>";
//    id = 23;
//    make = wwq;
//    name = weqew;
//    os = ddi;
//    type = Mobile;
//    "updated_at" = "<null>";
//    "user_id" = "<null>";
//};
