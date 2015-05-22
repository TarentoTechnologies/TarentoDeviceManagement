//
//  DMDeviceDetails.m
//  DeviceManagement
//
//  Created by Madhura Shettar on 5/5/15.
//  Copyright (c) 2015 Tabrez. All rights reserved.
//

#import "DMDeviceDetails.h"

@implementation DMDeviceDetails

@synthesize statusCode;


- (void)parseDeviceDetailsFromResponse:(NSDictionary *)userData {
    
       self.imei= [ParserUtility JSONObjectValue:userData forKey:kImei];
    self.accessoryInfo =[ParserUtility JSONObjectValue:userData forKey:kAccessoryInfo];
    self.createdAt = [ParserUtility JSONObjectValue:userData forKey:kCreatedAt];
    self.deviceId = [ParserUtility JSONObjectValue:userData forKey:kDeviceId];
    self.employeeId = [ParserUtility JSONObjectValue:userData forKey:kEmployeeId];
    self.firstName = [ParserUtility JSONObjectValue:userData forKey:kOwnerName];
    self.identifier =[ParserUtility JSONObjectValue:userData forKey:kIdentifier];
    self.make = [ParserUtility JSONObjectValue:userData forKey:kMake];
    self.name = [ParserUtility JSONObjectValue:userData forKey:kName];
    self.os = [ParserUtility JSONObjectValue:userData forKey:kOs];
    self.type = [ParserUtility JSONObjectValue:userData forKey:kType];
    self.updatedAt = [ParserUtility JSONObjectValue:userData forKey:kUpdatedAt];
    self.userId = [ParserUtility JSONObjectValue:userData forKey:kUserId];
}

@end
