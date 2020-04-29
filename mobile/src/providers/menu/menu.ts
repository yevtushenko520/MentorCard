
import { Injectable } from '@angular/core';
import { DashboardPage } from '../../pages/dashboard/dashboard';
import { StatisticsPage } from '../../pages/statistics/statistics';
import { StudentsPage } from '../../pages/students/students';
import { ChaptersPage } from '../../pages/chapters/chapters';
import { QuestionTablePage } from '../../pages/question-table/question-table';
import { PracticePage } from '../../pages/practice/practice';
import { MockTestPage } from '../../pages/mock-test/mock-test';
import { ShopPage } from '../../pages/shop/shop';
import { SystemPage } from '../../pages/system/system';
import { UserPage } from '../../pages/user/user';
import { AlertController } from 'ionic-angular';
import { LoginPage } from '../../pages/login/login';
import { UserProfilePage } from '../../pages/user-profile/user-profile';

/*
  Generated class for the MenuProvider provider.

  See https://angular.io/guide/dependency-injection for more info on providers
  and Angular DI.
*/
@Injectable()
export class MenuProvider {

  dev = [];
  devs = {};

  
  user_id_2:any;
  fp_id:any;

  constructor(public alertCtrl: AlertController) {


  
  }






  presentError() {
    let alert = this.alertCtrl.create({
    title: 'Sorry',
    subTitle: 'This is Demo version',
    buttons: ['Ok']
    });
    alert.present();
    }


    getSideMenusStude(){

      return [{ title: 'Dashboard', component: DashboardPage },
          { title: 'Statistics', component: StatisticsPage },
      
          {
            title: 'Learning structure',
            subPages: [{
              title: 'Chapters',
              component: ChaptersPage,
            }, {
              title: 'Question Table',
              component: QuestionTablePage,
            },
            {
              title: 'Practice sheets',
              component: PracticePage ,
            },
            {
              title: 'Mock Test',
              component: MockTestPage ,
            }
          ]
          },
       
      
          {
            title: 'Settings',
            subPages: [{
              title: 'System',
              component: SystemPage,
            }, {
              title: 'User',
              component:  UserProfilePage ,
            },
            {
              title: 'Exit',
              component: LoginPage ,
            }
            
          ]
          },
         
        
       
        ];

    }

  getSideMenus() {


    return [{ title: 'Dashboard', component: DashboardPage },
    { title: 'Statistics', component: StatisticsPage },
    { title: 'Students', component: StudentsPage },
    {
      title: 'Learning structure',
      subPages: [{
        title: 'Chapters',
        component: ChaptersPage,
      }, {
        title: 'Question Table',
        component: QuestionTablePage,
      },
      {
        title: 'Practice sheets',
        component: PracticePage ,
      },
      {
        title: 'Mock Test',
        component: MockTestPage ,
      }
    ]
    },
    { title: 'Shop', component: ShopPage },

    {
      title: 'Settings',
      subPages: [{
        title: 'System',
        component: SystemPage,
      }, {
        title: 'User',
        component:  UserProfilePage ,
      },
      {
        title: 'Exit',
        component: LoginPage ,
      }
      
    ]
    },
   
  
 
  ];
          
        
  
  }




}
