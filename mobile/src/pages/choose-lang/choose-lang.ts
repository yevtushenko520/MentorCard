import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, LoadingController } from 'ionic-angular';
import { LoginPage } from '../login/login';
import { DatabaseProvider } from '../../providers/database/database';

import { BehaviorSubject } from 'rxjs';
import { DashboardPage } from '../dashboard/dashboard';
/**
 * Generated class for the ChooseLangPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({

  selector: 'page-choose-lang',
  templateUrl: 'choose-lang.html',

})


export class ChooseLangPage {



  loading:any;

  devs = [];
dev = {};

  constructor(public navCtrl: NavController, public navParams: NavParams,private databaseProvider:DatabaseProvider,public loadingCtrl: LoadingController) {

   


        this.databaseProvider.getDatabaseState().subscribe(rdy=>{
          if(rdy){
            
            this.presentLoadingDefault();
            this.loadDev();
            
    
          }
        })

  }
  

  loadDev(){
    
    this.databaseProvider.getUsers().then(data=>{
      this.devs = data;

     
 
      if(data[0]['user_id']!=null){

        this.loading.dismiss();
        this.navCtrl.setRoot(DashboardPage);

      }else{
        this.loading.dismiss();
      }
    }).catch(this.loading.dismiss());

    this.loading.dismiss();
  }

  presentLoadingDefault() {
    this.loading = this.loadingCtrl.create({
      content: 'Please wait...'
    });
  
    this.loading.present();
  
  }


  postReg(){
    this.navCtrl.setRoot(LoginPage);
  }

}
