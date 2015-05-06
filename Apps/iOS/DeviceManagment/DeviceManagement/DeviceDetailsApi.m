//
//  DeviceDetailsApi.m
//  DeviceManagement
//
//  Created by Tabrez on 22/07/14.
//  Copyright (c) 2014 Tabrez. All rights reserved.
//

#import "DeviceDetailsApi.h"

@implementation DeviceDetailsApi


@synthesize deviceNumber;
@synthesize adminPin;
@synthesize deviceType;

@synthesize asset;

@synthesize employee_id;
@synthesize employee_name;
@synthesize hid;
@synthesize huid;
@synthesize hw_asset_number;
@synthesize hw_field_value;
@synthesize hw_subcategory;


@synthesize hw_category;
@synthesize hw_rented;
@synthesize email;
@synthesize hw_user_remarks;
@synthesize return_date;
@synthesize issued_date;


- (id)init
{
    self = [super init];
    
    if (self) {
        // Initialization..
    }
    
    return self;
}


#pragma mark -
#pragma mark - super class method.


- (NSString *)apiName
{
    return kDeviceDetailsApiUrl;
    
//    return [NSString stringWithFormat:@"%@%@",[super apiName],kDeviceDetailsApiUrl];
}


- (NSMutableDictionary *)createJsonObjectForRequest
{
    [super createJsonObjectForRequest];

    NSMutableDictionary *body = [[NSMutableDictionary alloc] initWithObjectsAndKeys:self.deviceNumber, @"assetnumber", self.deviceType, @"devicetype", self.adminPin, @"ownerpin", nil];
    
    NSMutableDictionary *jsonObject = [[NSMutableDictionary alloc] initWithObjectsAndKeys:body, kRequest,  nil];
    
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
    
    if (API_TESTING) {
        [self apiTesting];
        return nil;
    }
    
    if (response == [NSNull null]) {
        return nil;
    }
    
    if (nil != self.errormessage) {
        return nil;
    }
    
    NSMutableArray *userData = [response objectForKey:kResponse];
    
    self.asset = [response objectForKey:@"asset"];
    
    if (nil != userData) {
        
        if (userData.count > 0) {
            NSDictionary *detailDict = [userData objectAtIndex:0];
            
            self.employee_id = [detailDict objectForKey:@"employee_id"];
            self.employee_name = [detailDict objectForKey:@"employee_name"];
            self.hid = [detailDict objectForKey:@"hid"];
            self.huid = [detailDict objectForKey:@"huid"];
            self.hw_asset_number = [detailDict objectForKey:@"hw_asset_number"];
            self.hw_field_value = [detailDict objectForKey:@"hw_field_value"];
            self.hw_subcategory = [detailDict objectForKey:@"hw_subcategory"];
            
            self.hw_category = [detailDict objectForKey:@"hw_category"];
            self.hw_rented = [detailDict objectForKey:@"hw_rented"];
            self.email = [detailDict objectForKey:@"email"];
            self.hw_user_remarks = [detailDict objectForKey:@"hw_user_remarks"];
            self.return_date = [detailDict objectForKey:@"return_date"];
            self.issued_date = [detailDict objectForKey:@"issued_date"];
        }
    }
    
    return nil;
}


- (void)apiTesting
{
    self.hid = @"306";
    self.hw_category = @"Mobile";
    self.hw_subcategory = @"iPad Mini";
    self.hw_rented = @"0";
    self.hw_asset_number = @"TI/ipadmini/43";
    self.email = @"Jinesh.Sumedhan@tarento.com";
    self.hw_user_remarks = @"";
    self.return_date = @"1970-01-01";
    self.issued_date = @"";
    self.huid = @"353";
    self.hw_field_value = @"16GB";
}


@end
