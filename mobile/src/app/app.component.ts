import { Component, ViewChild } from '@angular/core';
import { Nav, Platform, MenuController } from 'ionic-angular';
import { StatusBar } from '@ionic-native/status-bar';
import { SplashScreen } from '@ionic-native/splash-screen';

//import { HomePage } from '../pages/home/home';
//import { ListPage } from '../pages/list/list';
//import { DashboardPage } from '../pages/dashboard/dashboard';
//import { StatisticsPage } from '../pages/statistics/statistics';
//import { ChaptersPage } from '../pages/chapters/chapters';
//import { QuestionTablePage } from '../pages/question-table/question-table';
//import { PracticePage } from '../pages/practice/practice';
/*import { MockTestPage } from '../pages/mock-test/mock-test';
import { UserPage } from '../pages/user/user';
import { SystemPage } from '../pages/system/system';
import { StudentsPage } from '../pages/students/students';
import { ShopPage } from '../pages/shop/shop';

import { LoginPage } from '../pages/login/login';
import { ChooseLangPage } from '../pages/choose-lang/choose-lang';*/
//import { HomePage } from '../pages/home/home';
import { MenuProvider } from '../providers/menu/menu';
import { AlertController } from 'ionic-angular';
import { MockTestPage } from '../pages/mock-test/mock-test';
import { PracticePage } from '../pages/practice/practice';
import { ChooseLangPage } from '../pages/choose-lang/choose-lang';
import { UserProfilePage } from '../pages/user-profile/user-profile';
import { StatisticsPage } from '../pages/statistics/statistics';
import { DatabaseProvider } from '../providers/database/database';


@Component({
  templateUrl: 'app.html'
})
export class MyApp {
  @ViewChild(Nav) nav: Nav;

  rootPage: any = ChooseLangPage;

  pages: any;
  selectedMenu: any;

  
  dev = [];
  devs = {};

  user_id_2:any;
  fp_id:any;

  constructor(public platform: Platform, public statusBar: StatusBar, public splashScreen: SplashScreen,
    public alertCtrl: AlertController, public menuProvider: MenuProvider,
    public menuCtrl: MenuController,private databaseProvider:DatabaseProvider) {
      
     

    this.initializeApp();

    // used for an example of ngFor and navigation
   
    
  }

  

  getSideMenuData() {


    
    
    
    this.databaseProvider.getDatabaseState().subscribe(rdy=>{
      if(rdy){
        

        this.databaseProvider.getUsers().then(data=>{
          this.devs = data;
    
        //  alert( data);
     
          if(data[0]['fp_id']!=null){
    
          //  this.loading.dismiss();
           if(data[0]['fp_id']==3){
            this.pages = this.menuProvider.getSideMenus();

           }else if(data[0]['fp_id']==4){
            this.pages = this.menuProvider.getSideMenusStude();
           }
    
          }else{
    
            this.pages = this.menuProvider.getSideMenusStude();
           
          }
        }).catch();

      }
    })


    

  
    
    
  }

  

  initializeApp() {
    this.platform.ready().then(() => {
      // Okay, so the platform is ready and our plugins are available.
      // Here you can do any higher level native things you might need.
     
      this.statusBar.styleDefault();
      this.splashScreen.hide();

   

      this.getSideMenuData();
    });
  }

  closeMenu(){

    const confirm = this.alertCtrl.create({
      title: 'Alert',
      message: 'Dow you want to exit?',
      buttons: [
        {
          text: 'Yes',
          handler: () => {
            console.log('Disagree clicked');
          }
        },
        {
          text: 'Cancel',
          role: 'cancel',
          handler: () => {
            console.log('Agree clicked');
          }
        }
      ]
    });
    confirm.present();
  }

  openPage(page, index) {
    // Reset the content nav to have just this page
    // we wouldn't want the back button to show in this scenario
    if (page.component) {
      this.nav.setRoot(page.component);
      this.menuCtrl.close();
    } else {
      if (this.selectedMenu) {
        this.selectedMenu = 0;
      } else {
        this.selectedMenu = index;
      }
    }
  }
}
