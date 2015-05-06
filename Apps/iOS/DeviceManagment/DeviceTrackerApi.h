//
//  DeviceTrackerApi.h
//  DeviceManagement
//
//  Created by Madhura Shettar on 5/4/15.
//  Copyright (c) 2015 Tabrez. All rights reserved.
//

#import "APIBase.h"

@interface DeviceTrackerApi : APIBase
@property(strong,nonatomic) NSNumber *appId;
@property(strong,nonatomic) NSString *apiToken;
@property(strong,nonatomic) NSString *imei;
@property(strong,nonatomic) NSString *currentLocaton;
@property(strong,nonatomic) NSString *ip;
@property(strong,nonatomic) NSString *wifi;
@property(strong,nonatomic) NSString *osVersion;
@property(strong,nonatomic) NSString *pin;


//{
//    "appId":1,
//    "apiToken":"111111",
//    "IMEI":"2431442",
//    "currentLocation":"test",
//    "ip":"xxx.xxx.xxx.xxx",
//    "wifi":"1334444",
//    "osVersion":"5",
//    "pin":"111"
//}
@end
