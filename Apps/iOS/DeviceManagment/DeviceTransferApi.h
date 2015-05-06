//
//  DeviceTransferApi.h
//  DeviceManagement
//
//  Created by Madhura Shettar on 5/4/15.
//  Copyright (c) 2015 Tabrez. All rights reserved.
//

#import "APIBase.h"

@interface DeviceTransferApi : APIBase

@property(strong, nonatomic) NSNumber *appId;
@property(strong, nonatomic) NSString *apiToken;
@property(strong, nonatomic) NSString *oldOwnerPin;
@property(strong, nonatomic) NSString *oldOwnerIdentifier;
@property(strong, nonatomic) NSString *ownerPin;
@property(strong, nonatomic) NSString *ownerIdentifier;
@property(strong, nonatomic) NSString *imei;
@property(strong, nonatomic) NSString *deviceId;



@end

///device-transfer

//{
//    "appId":1,
//    "apiToken":"111111",
//    "oldOwnerPin":"111",
//    "OldOwnerIdentifier":"114",
//    "newOwnerPin":"123",
//    "newOwnerIdentifier":"111",
//    "device_id":"2431442"
//}
