//
//  DeviceInfo.m
//  DeviceManagement
//
//  Created by Madhura Shettar on 5/5/15.
//  Copyright (c) 2015 Tabrez. All rights reserved.
//

#import "DeviceInfo.h"
#import "DataModel.h"


@implementation DeviceInfo

@dynamic accessoryInfo;
@dynamic createdAt;
@dynamic deviceId;
@dynamic employeeId;
@dynamic identifier;
@dynamic imei;
@dynamic make;
@dynamic name;
@dynamic os;
@dynamic type;
@dynamic updatedAt;
@dynamic userId;



+ (DeviceInfo *)initWithContext:(NSManagedObjectContext *)context
{
    DeviceInfo *info = [NSEntityDescription insertNewObjectForEntityForName:NSStringFromClass([DeviceInfo class]) inManagedObjectContext:context];
    return info;
}


+ (DeviceInfo *)deviceDetailsContext:(NSManagedObjectContext *)context
{
    NSFetchRequest *fetchRequest = [[NSFetchRequest alloc] init];
    NSString *name = NSStringFromClass([DeviceInfo class]);
    NSEntityDescription	*entity = [NSEntityDescription entityForName:name inManagedObjectContext:context];
    
    fetchRequest.entity =entity;
    
    NSError	*error;
    NSArray	*fetchedObjects = [context executeFetchRequest:fetchRequest error:&error];
    
    if([fetchedObjects count] > 0) {
        DBLog(@"DriverProfile Count = %lu",(unsigned long)[fetchedObjects count]);
        return [fetchedObjects objectAtIndex:0];
    }
    
    return nil;
}

+ (BOOL)storeDeviceInfo:(DMDeviceDetails *)deviceDetails inContex:(NSManagedObjectContext *)context
{
    DeviceInfo *info = [DeviceInfo deviceDetailsContext:context];
    
    if (nil == info) {
        info = [DeviceInfo initWithContext:context];
    }
    
    info.imei = deviceDetails.imei;
    info.identifier = deviceDetails.identifier;
    info.updatedAt = deviceDetails.updatedAt;
    info.userId = deviceDetails.userId;
    info.employeeId = deviceDetails.employeeId;
    info.accessoryInfo = deviceDetails.accessoryInfo;
    info.deviceId = deviceDetails.deviceId;
    info.name = deviceDetails.name;
    info.make = deviceDetails.make;
    info.os = deviceDetails.os;
    info.type = deviceDetails.type;
    
   return  [[DataModel sharedInstance] saveContext];
}


@end
