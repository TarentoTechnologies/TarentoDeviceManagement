//
//  UIImage+Resize.h

//
//  Created by Tabrez on 4/19/12.
//  Copyright (c) 2012 TTPL. All rights reserved.
//

#import <UIKit/UIKit.h>
#import <Foundation/Foundation.h>

@interface UIImage (Resize)

+ (void)beginImageContextWithSize:(CGSize)size;
+ (void)endImageContext;
+ (UIImage*)imageWithImage:(UIImage*)image scaledToSize:(CGSize)newSize;

+ (UIImage*)imageFromView:(UIView*)view;
+ (UIImage*)imageFromView:(UIView*)view scaledToSize:(CGSize)newSize;

@end
