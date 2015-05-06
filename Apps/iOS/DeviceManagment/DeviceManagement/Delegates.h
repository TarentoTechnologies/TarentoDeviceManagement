//
//  Delegates.h
//  DeviceManagement
//
//  Created by Tabrez on 11/08/14.
//  Copyright (c) 2014 Tabrez. All rights reserved.
//

#import <Foundation/Foundation.h>

@class DeviceDetailsApi;

@protocol DeviceReassignDelegate < NSObject >

@optional;
- (void)DeviceReassignedToNewUser:(DeviceDetailsApi *)details;

@end
