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


- (id)init {
    
    self = [super init];
    if (self) {
        //initializtion of self
        self.deviceDetails = [DMDeviceDetails new];
    }
    return self;
}


- (NSString *)apiName {
    return kGetDeviceInfo;
    
    //    return [NSString stringWithFormat:@"%@%@",[super apiName],kDeviceDetailsApiUrl];
}


- (NSMutableDictionary *)createJsonObjectForRequest {
    [super createJsonObjectForRequest];
    
    NSMutableDictionary *body = [[NSMutableDictionary alloc] initWithObjectsAndKeys:self.appId, @"appId", self.apiToken, @"apiToken", self.deviceId , @"device_id", self.type ,@"type", nil];
    //    NSMutableDictionary *jsonObject = [[NSMutableDictionary alloc] initWithObjectsAndKeys:body,nil];
    
    DBLog(@"jsonObject = %@",body);
    
    return body;
}


- (id)parseJsonObjectFromResponse:(id)response {
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
            [_deviceDetails parseDeviceDetailsFromResponse:userData];
        }
    }
    return nil;
}

-(BOOL)isPhone {
    if (UI_USER_INTERFACE_IDIOM() == UIUserInterfaceIdiomPhone|| UI_USER_INTERFACE_IDIOM() == UIUserInterfaceIdiomPad) {
        return YES;
    }
    else {
        return NO;
    }
    
}

@end
