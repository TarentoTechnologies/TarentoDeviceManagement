//
//  DeviceTransferApi.m
//  DeviceManagement
//
//  Created by Madhura Shettar on 5/4/15.
//  Copyright (c) 2015 Tabrez. All rights reserved.
//

#import "DeviceTransferApi.h"

@implementation DeviceTransferApi

@synthesize appId;
@synthesize apiToken;
@synthesize oldOwnerPin;
@synthesize oldOwnerIdentifier;
@synthesize ownerPin;
@synthesize ownerIdentifier;
@synthesize imei;
@synthesize deviceId;
- (id)init
{
    self = [super init];
    
    if (self) {
        // Initialization..
    }
    
    return self;
}

- (NSString *)apiName
{
    return kDeviceTransferApiUrl;
    
    //    return [NSString stringWithFormat:@"%@%@",[super apiName],kDeviceDetailsApiUrl];
}

- (NSMutableDictionary *)createJsonObjectForRequest
{
    [super createJsonObjectForRequest];
    
    NSMutableDictionary *body = [[NSMutableDictionary alloc] initWithObjectsAndKeys:self.appId, @"appId", self.apiToken, @"apiToken", self.ownerPin,@"oldOwnerPin", self.ownerIdentifier,@"OldOwnerIdentifier",self.oldOwnerPin,@"newOwnerPin",self.oldOwnerIdentifier,@"newOwnerIdentifier",self.deviceId,@"device_id" ,nil];
    
//    NSMutableDictionary *jsonObject = [[NSMutableDictionary alloc] initWithObjectsAndKeys:body,nil];
    
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
//   // NSMutableArray *userData = [response objectForKey:kResponseData];
//    
//    if (nil != userData) {
//        
//        if (userData.count > 0) {
//            NSDictionary *detailDict = [userData objectAtIndex:0];
//            
//            self.deviceDetails.employee_id = [detailDict objectForKey:@"employee_id"];
//            self.deviceDetails.employee_name = [detailDict objectForKey:@"employee_name"];
//            self.deviceDetails.hid = [detailDict objectForKey:@"hid"];
//            self.deviceDetails.huid = [detailDict objectForKey:@"huid"];
//            self.deviceDetails.hw_asset_number = [detailDict objectForKey:@"hw_asset_number"];
//            self.deviceDetails.hw_field_value = [detailDict objectForKey:@"hw_field_value"];
//            self.deviceDetails.hw_subcategory = [detailDict objectForKey:@"hw_subcategory"];
//        }
//    }
//    
//    return nil;
//}

@end
