//
//  GetDeviceInfo.h
//  DeviceManagement
//
//  Created by Madhura Shettar on 5/5/15.
//  Copyright (c) 2015 Tabrez. All rights reserved.
//

#import "APIBase.h"

@class DMDeviceDetails;

@interface GetDeviceInfo : APIBase

@property (strong, nonatomic) NSNumber *appId;
@property (strong, nonatomic) NSString *apiToken;
@property (strong, nonatomic) NSString *deviceId;
@property (strong, nonatomic) NSString *type;
@property (strong, nonatomic) DMDeviceDetails *deviceDetails;

- (BOOL)isPhone;

@end

//{
//    "appId":1,
//    "apiToken":"111111",
//    "device_id":"1111",
//    "type":"mobile"
//}

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
