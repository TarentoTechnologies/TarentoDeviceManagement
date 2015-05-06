//
//  DataModel.m
//  DeviceManagement
//
//  Created by Madhura Shettar on 5/5/15.
//  Copyright (c) 2015 Tabrez. All rights reserved.
//

#import "DataModel.h"
#import "DeviceInfo.h"

@implementation DataModel

@synthesize managedObjectContext;
@synthesize managedObjectModel;
@synthesize persistentStoreCoordinator;

static DataModel *modelInstance = nil;

+ (DataModel *)sharedInstance
{
    @synchronized(self) {
        if(modelInstance == nil) {
            modelInstance = [[super allocWithZone:NULL] init];
        }
    }
    return modelInstance;
}


+ (id)allocWithZone:(NSZone *)zone
{
    return [self sharedInstance];
}


- (id)copyWithZone:(NSZone *)zone
{
    return self;
}

- (NSManagedObjectContext *)managedObjectContext
{
    if (managedObjectContext != nil) {
        return managedObjectContext;
    }
    
    NSPersistentStoreCoordinator *coordinator = self.persistentStoreCoordinator;
    if (coordinator != nil) {
        managedObjectContext = [[NSManagedObjectContext alloc] init];
        [managedObjectContext setPersistentStoreCoordinator:coordinator];
    }
    return managedObjectContext;
}


/**
 Returns the managed object model for the application.
 If the model doesn't already exist, it is created from the application's model.
 */
- (NSManagedObjectModel *)managedObjectModel
{
    if (managedObjectModel != nil) {
        return managedObjectModel;
    }
    
    self.managedObjectModel = [NSManagedObjectModel mergedModelFromBundles:nil];
    return managedObjectModel;
}


-(BOOL)saveContext
{
    NSError *error;
    
    if ([self.managedObjectContext hasChanges] && ![self.managedObjectContext save:&error]) {
        // Update to handle the error appropriately.
        NSLog(@"Unresolved error %@, %@", error, [error userInfo]);
        return NO;
    }
    
    return YES;
}

//- (BOOL)saveContext
//{
//    @synchronized(self) {
//        NSError	*error = nil;
//        if (self.managedObjectContext.hasChanges) {
//            if (![self.managedObjectContext save:&error]) {
//                DBLog(@"Couldn't save: %@", [error localizedDescription]);
//                return NO;
//            }
//        }
//        
//        return YES;
//    }
//}

- (NSURL *)applicationDocumentsDirectory
{
    return [[[NSFileManager defaultManager] URLsForDirectory:NSDocumentDirectory
                                                   inDomains:NSUserDomainMask] lastObject];
}

- (NSPersistentStoreCoordinator *)persistentStoreCoordinator
{
    if (persistentStoreCoordinator != nil) {
        return persistentStoreCoordinator;
    }
    
    NSDictionary *options = @{NSMigratePersistentStoresAutomaticallyOption:@(YES),
                              NSInferMappingModelAutomaticallyOption:@(YES)};
    
    NSURL *storeURL = [[self applicationDocumentsDirectory] URLByAppendingPathComponent:@"dataModel.sqlite"];
    
    NSError *error = nil;
    self.persistentStoreCoordinator = [[NSPersistentStoreCoordinator alloc]
                                       initWithManagedObjectModel:[self managedObjectModel]];
    
    if (![persistentStoreCoordinator addPersistentStoreWithType:NSSQLiteStoreType
                                                  configuration:nil
                                                            URL:storeURL
                                                        options:options
                                                          error:&error]) {
        NSLog(@"Unresolved error %@, %@", error, [error userInfo]);
       
    }
    
    return persistentStoreCoordinator;
}

- (DeviceInfo *)deviceDetails {
    DeviceInfo *info = [DeviceInfo deviceDetailsContext:self.managedObjectContext];
    return info;
}


- (BOOL)storeDeviceDetils:(DMDeviceDetails *)details {
    return [DeviceInfo storeDeviceInfo:details inContex:self.managedObjectContext];
}



@end
