//
//  DataModel.h
//  DeviceManagement
//
//  Created by Madhura Shettar on 5/5/15.
//  Copyright (c) 2015 Tabrez. All rights reserved.
//

#import <Foundation/Foundation.h>

@class DeviceInfo;
@class DMDeviceDetails;


@interface DataModel : NSObject


@property (nonatomic, strong) NSManagedObjectContext *managedObjectContext;
@property (nonatomic, strong) NSManagedObjectModel *managedObjectModel;
@property (nonatomic, strong) NSPersistentStoreCoordinator *persistentStoreCoordinator;

+(DataModel *)sharedInstance;
- (NSURL *)applicationDocumentsDirectory;
- (BOOL)saveContext;
- (NSPersistentStoreCoordinator *)persistentStoreCoordinator;

- (DeviceInfo *)deviceDetails;
- (BOOL)storeDeviceDetils:(DMDeviceDetails *)detailsl;

@end
