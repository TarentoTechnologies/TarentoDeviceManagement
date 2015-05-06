//
//  DeviceAssignApi.h
//  DeviceManagement
//
//  Created by Tabrez on 22/07/14.
//  Copyright (c) 2014 Tabrez. All rights reserved.
//

#import "APIBase.h"

@class DeviceDetailsApi;

@interface DeviceAssignApi : APIBase

@property (strong, nonatomic) NSString *hardwareid;
@property (strong, nonatomic) NSString *huid;
@property (strong, nonatomic) NSString *oldempid;
@property (strong, nonatomic) NSString *oldpin;
@property (strong, nonatomic) NSString *newempid;
@property (strong, nonatomic) NSString *newpin;

@property (strong, nonatomic) NSString *email;

@property (strong, nonatomic) DeviceDetailsApi *deviceDetails;

@end

/*

"email":"Rahul.Antonyraj@tarento.com",
"hardwareid":306,
"oldpin":123,
"newpin":123

*/


/*

[24/07/14 12:26:20 pm] sanjay rahul: http://172.17.20.155/hardware_api/assignhardware/format/json/
[24/07/14 12:26:28 pm] sanjay rahul: {
    
    "reassign": {
        
        "hardware_id": 306,
        
        "huid": 389,
        
        "old_emp_id": 106,
        
        "old_pin": "fw55t81",
        
        "new_emp_id": 176,
        
        "new_pin": "qa12e34"
        
    }
    
}

*/