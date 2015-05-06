//
//  DeviceDetailsApi.h
//  DeviceManagement
//
//  Created by Tabrez on 22/07/14.
//  Copyright (c) 2014 Tabrez. All rights reserved.
//

#import "APIBase.h"

@interface DeviceDetailsApi : APIBase

@property (strong, nonatomic) NSString *deviceNumber;
@property (strong, nonatomic) NSString *adminPin;
@property (strong, nonatomic) NSString *deviceType;

@property (strong, nonatomic) NSString *asset;

@property (strong, nonatomic) NSString *employee_id;
@property (strong, nonatomic) NSString *employee_name;
@property (nonatomic, strong) NSString *hid;
@property (nonatomic, strong) NSString *huid;
@property (nonatomic, strong) NSString *hw_asset_number;
@property (nonatomic, strong) NSString *hw_field_value;
@property (nonatomic, strong) NSString *hw_subcategory;


@property (nonatomic, strong) NSString *hw_category;
@property (nonatomic, strong) NSString *hw_rented;
@property (nonatomic, strong) NSString *email;
@property (nonatomic, strong) NSString *hw_user_remarks;
@property (nonatomic, strong) NSString *return_date;
@property (nonatomic, strong) NSString *issued_date;






- (void)apiTesting;


@end




// Api response object..

/*
 

{
    "response":[
                {
                    "hid":"306",
                    "hw_category":"Mobile",
                    "hw_subcategory":"iPad Mini",
                    "hw_rented":"0",
                    "hw_asset_number":"TI\/ipadmini\/43",
                    "email":"Jinesh.Sumedhan@tarento.com",
                    "hw_user_remarks":"",
                    "return_date":"1970-01-01",
                    "issued_date":null,
                    "huid":"353",
                    "hw_field_value":"16GB"
                },
                {
                    "hid":"306",
                    "hw_category":"Mobile",
                    "hw_subcategory":"iPad Mini",
                    "hw_rented":"0",
                    "hw_asset_number":"TI\/ipadmini\/43",
                    "email":"Jinesh.Sumedhan@tarento.com",
                    "hw_user_remarks":"",
                    "return_date":"1970-01-01",
                    "issued_date":null,
                    "huid":"353",
                    "hw_field_value":"A1357W010A051"
                },
                {
                    "hid":"306",
                    "hw_category":"Mobile",
                    "hw_subcategory":"iPad Mini",
                    "hw_rented":"0",
                    "hw_asset_number":"TI\/ipadmini\/43",
                    "email":"Jinesh.Sumedhan@tarento.com",
                    "hw_user_remarks":"",
                    "return_date":"1970-01-01",
                    "issued_date":null,
                    "huid":"353",
                    "hw_field_value":"24:A2:E1:01:E0:45"
                }
                ],
    "statusCode":200,
    "status":"success"
}

*/