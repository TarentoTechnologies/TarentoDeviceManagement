//
//  ParserUtility.m
//  CabHoundPassenger
//
//  Created by Tarento technologies on 4/18/13.
//  Copyright (c) 2013 Tarento technologies. All rights reserved.
//

#import "ParserUtility.h"

@implementation ParserUtility


+ (id)JSONObjectValue:(id)jsonObject forKey:(NSString *)key
{
    if (([jsonObject valueForKey:key] != [NSNull null]) && (nil != [jsonObject valueForKey:key])) {
        return [jsonObject valueForKey:key];
    }
    return nil;
}


@end
