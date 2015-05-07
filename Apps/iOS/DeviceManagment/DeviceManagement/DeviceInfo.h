//
//  DeviceInfo.h
//  DeviceManagement
//
//  Created by Madhura Shettar on 5/5/15.
//  Copyright (c) 2015 Tabrez. All rights reserved.
//

#import <Foundation/Foundation.h>
#import <CoreData/CoreData.h>
#import "DMDeviceDetails.h"


@interface DeviceInfo : NSManagedObject

@property (nonatomic, retain) NSString * accessoryInfo;
@property (nonatomic, retain) NSString * createdAt;
@property (nonatomic, retain) NSString * deviceId;
@property (nonatomic, retain) NSString * employeeId;
@property (nonatomic, retain) NSString * identifier;
@property (nonatomic, retain) NSString * imei;
@property (nonatomic, retain) NSString * make;
@property (nonatomic, retain) NSString * name;
@property (nonatomic, retain) NSString * os;
@property (nonatomic, retain) NSString * type;
@property (nonatomic, retain) NSString * updatedAt;
@property (nonatomic, retain) NSString * userId;
@property (nonatomic ,retain) NSString * firstName;
@property (strong ,nonatomic) DMDeviceDetails *deviceDetails;


@end


@interface DeviceInfo (HeleperMethods)

+ (DeviceInfo *)initWithContext:(NSManagedObjectContext *)context;
+ (DeviceInfo *)deviceDetailsContext:(NSManagedObjectContext *)context;
+ (BOOL)storeDeviceInfo:(DMDeviceDetails *)deviceDetails inContex:(NSManagedObjectContext *)context;

@end





