import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, AlertController, LoadingController } from 'ionic-angular';
import { LoginPage } from '../login/login';
import { DashboardPage } from '../dashboard/dashboard';
import { HttpClient } from '@angular/common/http';
import {Observable } from 'rxjs/Observable';
/**
 * Generated class for the RegisterPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-register',
  templateUrl: 'register.html',
})


export class RegisterPage {

  loading:any;
  data: Observable<any>;
  regData = { fn:'',ln:'',email:'',rap_email:'',pass:'',phone:'',num:'',bith:'',street:'',
  postcode:'',city:'',pin:'' }; 
  lang_1:any;
  lang_2:any;
  check_1:boolean;
  check_2:boolean;
  check_3:boolean;
  constructor(public navCtrl: NavController, public navParams: NavParams,public loadingCtrl: LoadingController,
     private alertCtrl: AlertController, public http: HttpClient) {
  }

  

  moveToLogin(){
    this.navCtrl.setRoot(LoginPage);
  }

  updateCucumber1() {
    console.log('Cucumbers new state:' + this.check_1);
  }



  presentLoadingDefault() {
    this.loading = this.loadingCtrl.create({
      content: 'Please wait...'
    });
  
    this.loading.present();
  
  }


  postReg(){

    if(this.regData.fn.length > 0 && this.regData.ln.length > 0 && this.regData.email.length > 0
      && this.regData.rap_email.length > 0  && this.regData.pass.length > 0 && this.regData.phone.length > 0
      && this.regData.num.length > 0  && this.regData.bith.length > 0 && this.regData.street.length > 0
      && this.regData.postcode.length > 0  && this.regData.city.length > 0 && this.regData.pin.length > 0){

        if(this.regData.rap_email == this.regData.email){

          if(this.check_1 == true && this.check_3 == true && this.check_2 == true){
    this.presentLoadingDefault();
    var url = "http://www.mentorcard.de/api/register.php";
    let postData = new FormData();
    postData.append('username',this.regData.email);
    postData.append('password',this.regData.pass);
    postData.append('first_name',this.regData.fn);
    postData.append('last_name',this.regData.ln);
    postData.append('date',this.regData.bith);
    postData.append('place',this.regData.street);
    postData.append('country',this.regData.city);
    postData.append('phone',this.regData.num);
    postData.append('email',this.regData.email);
    postData.append('active_code',this.regData.pin);
    this.data = this.http.post(url,postData);

    this.data.subscribe(data =>{

     if(data['status']=="200 OK"){

      
      this.loading.dismiss();
      document.location.href = 'index.html';
        
      }else {

        this.loading.dismiss();
        this.presentError();
        
      }

  console.log(data);
    });

    this.loading.dismiss();
  }else{

  }

  }else{
this.presentError2();
  }
  }else{

 
    this.presentError();
  }

  }

  presentError() {
    let alert = this.alertCtrl.create({
    title: 'Error',
    subTitle: 'Field is empty',
    buttons: ['Ok']
    });
    alert.present();
    }
    

    presentError3() {
      let alert = this.alertCtrl.create({
      title: 'Error',
      subTitle: 'Accept agreements',
      buttons: ['Ok']
      });
      alert.present();
      }
      

    presentError2() {
      let alert = this.alertCtrl.create({
      title: 'Error',
      subTitle: 'Email do not match',
      buttons: ['Ok']
      });
      alert.present();
      }
 

}
