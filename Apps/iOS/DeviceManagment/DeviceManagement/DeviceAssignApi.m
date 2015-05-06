//
//  DeviceAssignApi.m
//  DeviceManagement
//
//  Created by Tabrez on 22/07/14.
//  Copyright (c) 2014 Tabrez. All rights reserved.
//

#import "DeviceAssignApi.h"
#import "DeviceDetailsApi.h"

@implementation DeviceAssignApi

@synthesize hardwareid;
@synthesize huid;
@synthesize oldempid;
@synthesize oldpin;
@synthesize newempid;
@synthesize newpin;


@synthesize email;


- (id)init
{
    self = [super init];
    
    if (self) {
        // Initialization..
        
        self.deviceDetails = [[DeviceDetailsApi alloc] init];
    }
    
    return self;
}


#pragma mark -
#pragma mark - super class method.


- (NSString *)apiName
{
    return kDeviceAssignApiUrl;
    
    //return [NSString stringWithFormat:@"%@%@",[super apiName],kDeviceDetailsApiUrl];
}


- (NSMutableDictionary *)createJsonObjectForRequest
{
    [super createJsonObjectForRequest];
    
    //NSMutableDictionary *body = [[NSMutableDictionary alloc] initWithObjectsAndKeys:self.email, @"email", self.hardwareid, @"hardwareid", self.oldpin, @"oldpin", self.newpin, @"newpin", nil];
    
    NSMutableDictionary *body = [[NSMutableDictionary alloc] initWithObjectsAndKeys:self.hardwareid, @"hardware_id", self.huid, @"huid", self.oldempid, @"old_emp_id", self.oldpin, @"old_pin", self.newempid, @"new_emp_id", self.newpin, @"new_pin", nil];
    
    NSMutableDictionary *jsonObject = [[NSMutableDictionary alloc] initWithObjectsAndKeys:body, @"reassign",  nil];
    
    DBLog(@"jsonObject = %@",jsonObject);
    
    return jsonObject;
}


- (void)checkForNilValues
{
    [super checkForNilValues];
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
    
    NSMutableArray *userData = [response objectForKey:kResponseData];
    
    if (nil != userData) {
        
        if (userData.count > 0) {
            NSDictionary *detailDict = [userData objectAtIndex:0];
            
            self.deviceDetails.employee_id = [detailDict objectForKey:@"employee_id"];
            self.deviceDetails.employee_name = [detailDict objectForKey:@"employee_name"];
            self.deviceDetails.hid = [detailDict objectForKey:@"hid"];
            self.deviceDetails.huid = [detailDict objectForKey:@"huid"];
            self.deviceDetails.hw_asset_number = [detailDict objectForKey:@"hw_asset_number"];
            self.deviceDetails.hw_field_value = [detailDict objectForKey:@"hw_field_value"];
            self.deviceDetails.hw_subcategory = [detailDict objectForKey:@"hw_subcategory"];
        }
    }

    return nil;
}


@end
