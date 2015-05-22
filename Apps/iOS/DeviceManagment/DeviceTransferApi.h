//
//  DeviceTransferApi.h
//  DeviceManagement
//
//  Created by Madhura Shettar on 5/4/15.
//  Copyright (c) 2015 Tabrez. All rights reserved.
//

#import "APIBase.h"

@class DMDeviceDetails;

@interface DeviceTransferApi : APIBase

@property(strong, nonatomic) NSNumber *appId;
@property(strong, nonatomic) NSString *apiToken;
@property(strong, nonatomic) NSString *oldOwnerPin;
@property(strong, nonatomic) NSString *oldOwnerIdentifier;
@property(strong, nonatomic) NSString *newownerPin;
@property(strong, nonatomic) NSString *newownerIdentifier;
@property(strong, nonatomic) NSString *imei;
@property(strong, nonatomic) NSString *deviceId;
@property(strong, nonatomic) NSString *type;
@property(strong, nonatomic) NSString *empId;
@property(strong, nonatomic) DMDeviceDetails *details;

@end

///device-transfer request

//{
//    "appId":1,
//    "apiToken":"111111",
//    "oldOwnerPin":"114",
//    "OldOwnerIdentifier":"114",
//    "newOwnerPin":"111",
//    "newOwnerIdentifier":"111",
//    "device_id":"1",
//    "type":"iphone"
//}



//device - transfer response
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
