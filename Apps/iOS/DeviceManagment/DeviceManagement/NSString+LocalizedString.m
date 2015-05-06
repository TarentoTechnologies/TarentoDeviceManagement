//
//  NSString+LocalizedString.m
//  DeviceManagement
//
//  Created by Tabrez on 18/07/14.
//  Copyright (c) 2014 Tabrez. All rights reserved.
//

#import "NSString+LocalizedString.h"

@implementation NSString (LocalizedString)


+ (NSString *)localizedValueForKey:(NSString *)key
{
    
    NSString *value = nil;
    
    if (nil == key) {
        return value;
    }
    
    value = NSLocalizedString(key, key);
    
    return value;
}


@end
