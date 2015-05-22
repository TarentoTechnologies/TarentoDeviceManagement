//
//  DeviceTransferApi.m
//  DeviceManagement
//
//  Created by Madhura Shettar on 5/4/15.
//  Copyright (c) 2015 Tabrez. All rights reserved.
//

#import "DeviceTransferApi.h"
#import "DMDeviceDetails.h"

@implementation DeviceTransferApi

@synthesize appId;
@synthesize apiToken;
@synthesize oldOwnerPin;
@synthesize oldOwnerIdentifier;
@synthesize newownerPin;
@synthesize newownerIdentifier;
@synthesize imei;
@synthesize deviceId;
@synthesize statusCode;
@synthesize empId;


- (id)init {
    self = [super init];
    
    if (self) {
        // Initialization..
        self.details = [[DMDeviceDetails alloc] init];
    }
    return self;
}

- (NSString *)apiName {
    return kDeviceTransferApiUrl;
    //    return [NSString stringWithFormat:@"%@%@",[super apiName],kDeviceDetailsApiUrl];
}

- (NSMutableDictionary *)createJsonObjectForRequest {
    [super createJsonObjectForRequest];
    
    NSMutableDictionary *body = [[NSMutableDictionary alloc] initWithObjectsAndKeys:self.appId, @"appId", self.apiToken, @"apiToken", self.newownerPin, @"newOwnerPin",self.newownerIdentifier,@"newOwnerIdentifier",self.oldOwnerPin, @"oldOwnerPin",self.oldOwnerIdentifier,@"OldOwnerIdentifier",self.deviceId,@"device_id", self.type,@"type",nil];
    
//    NSMutableDictionary *jsonObject = [[NSMutableDictionary alloc] initWithObjectsAndKeys:body,nil];
    
    DBLog(@"jsonObject = %@",body);
    
    return body;
}


- (void)checkForNilValues {
    [super checkForNilValues];
}


- (id)parseJsonObjectFromResponse:(id)response {
    [super parseJsonObjectFromResponse:response];
    
    if (response == [NSNull null]) {
        return nil;
    }
    
    if (nil != self.errormessage) {
        return nil;
    }
    
   NSDictionary *userData = [response objectForKey:kResponseData];
    
    if (nil != userData) {
        if ([userData respondsToSelector:@selector(objectForKey:)]) {
         // if (self.statusCode.integerValue == 200) {
                [_details parseDeviceDetailsFromResponse:userData];
         // }
            
        }
    }
    return nil;
}

@end
