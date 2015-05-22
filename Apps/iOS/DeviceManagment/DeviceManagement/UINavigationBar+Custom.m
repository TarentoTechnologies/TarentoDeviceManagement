//
//  UINavigationBar+Custom.m
//  CabHoundPassenger
//
//  Created by Tabrez on 10/02/14.
//  Copyright (c) 2014 Tarento technologies. All rights reserved.
//

#import "UINavigationBar+Custom.h"

#import "UIImage+Resize.h"

#import "ApiDefines.h"

@implementation UINavigationBar (Custom)


- (void)setDefaultBackGroundAndBarTintColor
{
    if (IS_IOS7) {
        
//        if ([self respondsToSelector:@selector(setBarTintColor:)]) {
//            [self setBarTintColor:[UIColor clearColor]];
//            [self setAlpha:0.5];
//            [self setTranslucent:YES];
//        }
        
        [self setTintColor:[UIColor blackColor]];
        
        [self setBarTintColor:[UIColor colorWithWhite:1 alpha:0.7]];
        [self setBackgroundImage:[UIImage imageNamed:@"navigationBar.png"]
                                 forBarMetrics:UIBarMetricsDefault];
        self.shadowImage = [UIImage new];
        self.translucent = YES;
        [self setAlpha:0.8];
    }
    else {
        [[UINavigationBar appearance] setTintColor:BLACK_COLOR];
    }
}


@end
