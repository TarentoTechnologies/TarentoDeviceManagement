//
//  ApiDefines.h
//  DeviceManagement
//
//  Created by Tabrez on 21/07/14.
//  Copyright (c) 2014 Tabrez. All rights reserved.
//

#ifndef DeviceManagement_ApiDefines_h
#define DeviceManagement_ApiDefines_h

#define KBaseURL @"http://172.17.18.15:9000"

#define API_SUCESS 200

#define kStatusCode @"statusCode"
#define kStatusMessage @"status"
#define kResponse @"response"
//#define kResponseData @"responseData"

#define kDeviceDetailsApiUrl @"http://172.17.18.15:9000/hardware_api/hardwareiphone/format/json/"

#define kDeviceAssignApiUrl @"http://172.17.18.15:9000/hardware_api/assignhardware/format/json/"

static NSString *const kGetDeviceInfo = @"/get-device-info";
static NSString *const kDeviceTrackerApiUrl =  @"/device-tracker";
static NSString *const kDeviceTransferApiUrl = @"/device-transfer";

#define kRequest @"request"
#define kResponseData @ "responseData"


/* getdevicinfo api keys*/

static NSString *const kImei = @"IMEI";
static NSString *const kAccessoryInfo =@"accessoryinfo";
static NSString *const kCreatedAt =@"created_at" ;
static NSString *const kDeviceId = @"device_id";
static NSString *const kEmployeeId = @"employee_id";
static NSString *const kIdentifier =@"id";
static NSString *const kMake =@"make";
static NSString *const kName = @"name";
static NSString *const kOs =@"os";
static NSString *const kType =@"type" ;
static NSString *const kUpdatedAt = @"updated_at";
static NSString *const kUserId =@"user_id";


//IMEI = dsjdjdjasjdsajdsa;
//accessoryinfo = ssdjsaddjsa;
//"created_at" = "0000-00-00 00:00:00";
//"device_id" = 1111;
//"employee_id" = "<null>";
//id = 23;
//make = wwq;
//name = weqew;
//os = ddi;
//type = Mobile;
//"updated_at" = "<null>";
//"user_id" = "<null>";

#endif


