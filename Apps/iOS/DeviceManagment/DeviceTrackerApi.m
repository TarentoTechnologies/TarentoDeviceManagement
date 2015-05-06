//
//  DeviceTrackerApi.m
//  DeviceManagement
//
//  Created by Madhura Shettar on 5/4/15.
//  Copyright (c) 2015 Tabrez. All rights reserved.
//

#import "DeviceTrackerApi.h"

@implementation DeviceTrackerApi
@synthesize appId;
@synthesize apiToken;
@synthesize imei;
@synthesize ip;
@synthesize osVersion;
@synthesize pin;
@synthesize wifi;
@synthesize currentLocaton;

-(id)init {
    self =[super init];
    
    if (self) {
    // Initialization..
    }
    return self;
}

- (NSString *)apiName
{
    return kDeviceTrackerApiUrl;
    
    //    return [NSString stringWithFormat:@"%@%@",[super apiName],kDeviceDetailsApiUrl];
}

- (NSMutableDictionary *)createJsonObjectForRequest
{
    [super createJsonObjectForRequest];
    
    NSMutableDictionary *body = [[NSMutableDictionary alloc] initWithObjectsAndKeys:self.appId, @"appId", self.apiToken, @"apiToken", self.imei,@"IMEI",self.currentLocaton,@"currentLocation",self.ip,@"ip",self.wifi,@"wifi",self.osVersion,@"osVersion",self.pin,@"pin", nil];
    
      // NSMutableDictionary *jsonObject = [[NSMutableDictionary alloc] initWithObjectsAndKeys:body,kResponseData,nil];
    
    DBLog(@"jsonObject = %@",body);
    
    return body;
}

- (void)checkForNilValues
{
    [super checkForNilValues];
}

//- (id)parseJsonObjectFromResponse:(id)response
//{
//    [super parseJsonObjectFromResponse:response];
//
//    if (response == [NSNull null]) {
//        return nil;
//    }
//
//    if (nil != self.errormessage) {
//        return nil;
//    }
//
//    NSMutableArray *userData = [response objectForKey:kResponseData];
//
//    if (nil != userData) {
//
//        if (userData.count > 0) {
//            NSDictionary *detailDict = [userData objectAtIndex:0];
//
//            self.appId = [detailDict objectForKey: @"appId"];
//            self.apiToken = [detailDict objectForKey:@"apiToken"];
//            self.imei= [detailDict objectForKey:@"IMEI"];
//            self.currentLocaton= [detailDict objectForKey:@"currentLocation"];
//            self.ip = [detailDict objectForKey:@"ip"];
//            self.wifi= [detailDict objectForKey:@"wifi"];
//            self.osVersion = [detailDict objectForKey:@"osVersion"];
//            self.pin = [detailDict objectForKey:@"pin"];
//        }
//    }
//
//    return nil;
//}


@end
