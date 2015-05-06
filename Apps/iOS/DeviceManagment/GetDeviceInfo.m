//
//  GetDeviceInfo.m
//  DeviceManagement
//
//  Created by Madhura Shettar on 5/5/15.
//  Copyright (c) 2015 Tabrez. All rights reserved.
//

#import "GetDeviceInfo.h"
#import "DMDeviceDetails.h"
#import "ParserUtility.h"

@implementation GetDeviceInfo


@synthesize appId;
@synthesize apiToken;
@synthesize deviceId;
@synthesize type;


-(id)init {
    
    self = [super init];
    
    if (self) {
        //initializtion of self
        self.deviceDetails = [DMDeviceDetails new];
    }
    
    return self;
}

- (NSString *)apiName
{
    return kGetDeviceInfo;
    
    //    return [NSString stringWithFormat:@"%@%@",[super apiName],kDeviceDetailsApiUrl];
}

- (NSMutableDictionary *)createJsonObjectForRequest
{
    [super createJsonObjectForRequest];
    
    NSMutableDictionary *body = [[NSMutableDictionary alloc] initWithObjectsAndKeys:self.appId, @"appId", self.apiToken, @"apiToken", self.deviceId , @"device_id", self.type ,@"type", nil];
    //    NSMutableDictionary *jsonObject = [[NSMutableDictionary alloc] initWithObjectsAndKeys:body,nil];
    
    DBLog(@"jsonObject = %@",body);
    
    return body;
}

- (id)parseJsonObjectFromResponse:(id)response
{
    [super parseJsonObjectFromResponse:response];

    if (response == [NSNull null]) {
        return nil;
    }

    if (nil != self.errormessage) {
        return nil;
    }

   NSMutableDictionary *userData = [response objectForKey:kResponseData];

    if (nil != userData) {

        if ([userData respondsToSelector:@selector(objectForKey:)])  {
//            self.appId = [detailDict objectForKey:@"appId"];
//            self.apiToken = [detailDict objectForKey:@"apiToken"];
//            self.deviceId = [detailDict objectForKey:@"device_id"];
//            self.type  = [detailDict objectForKey:@"type"];
           
            _deviceDetails.identifier = [ParserUtility JSONObjectValue:userData forKey:kIdentifier];
            _deviceDetails.employeeId = [ParserUtility JSONObjectValue:userData forKey:kEmployeeId];;
            _deviceDetails.imei = [ParserUtility JSONObjectValue:userData forKey:kImei];
            _deviceDetails.createdAt =[ParserUtility JSONObjectValue:userData forKey:kCreatedAt];
            _deviceDetails.userId = [ParserUtility JSONObjectValue:userData forKey:kUpdatedAt];
            _deviceDetails.os = [ParserUtility JSONObjectValue:userData forKey:kOs];
            _deviceDetails.type = [ParserUtility JSONObjectValue:userData forKey:kType];
            _deviceDetails.name =[ParserUtility JSONObjectValue:userData forKey:kName];
            _deviceDetails.make = [ParserUtility JSONObjectValue:userData forKey:kMake];
            _deviceDetails.deviceId = [ParserUtility JSONObjectValue:userData forKey:kDeviceId];
            _deviceDetails.accessoryInfo = [ParserUtility JSONObjectValue:userData forKey:kAccessoryInfo];
            //_deviceDetails.updatedAt = [detailDict objectForKey:kUpdatedAt];
            _deviceDetails.updatedAt =  [ParserUtility JSONObjectValue:userData forKey:kUpdatedAt];
            
        }
    }
    return nil;
}
@end
