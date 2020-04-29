import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, LoadingController, AlertController } from 'ionic-angular';
import { FormGroup, AbstractControl, Validators, FormBuilder } from '@angular/forms';
import { ForgotPage } from '../forgot/forgot';
import { RegisterPage } from '../register/register';
import { DashboardPage } from '../dashboard/dashboard';
import { HttpClient } from '@angular/common/http';
import {Observable } from 'rxjs/Observable';
import { ChooseLangPage } from '../choose-lang/choose-lang';
import { DatabaseProvider } from '../../providers/database/database';

/**
 * Generated class for the LoginPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-login',
  templateUrl: 'login.html',
})
export class LoginPage {

  authForm : FormGroup;
	email: AbstractControl;
	password: AbstractControl;
  loginData = { email:'', password:'' };
  loading:any;
  data: Observable<any>;

  devs = [];
dev = {};

  constructor(public navCtrl: NavController,public loadingCtrl: LoadingController, public navParams: NavParams,public fb: FormBuilder,
    private alertCtrl: AlertController, public http: HttpClient,private databaseProvider:DatabaseProvider) {
    this.authForm = this.fb.group({
      'email' : [null, Validators.compose([Validators.required])],
      'password': [null, Validators.compose([Validators.required])],
    });

    
        this.email = this.authForm.controls['email'];
        this.password = this.authForm.controls['password'];
  }


  ionViewDidEnter() {
    this.presentLoadingDefault();
    this.loadDev();
}



  presentLoadingDefault() {
    this.loading = this.loadingCtrl.create({
      content: 'Please wait...'
    });
  
    this.loading.present();
  
  }

  moveToChoose(){
    this.navCtrl.setRoot(ChooseLangPage);
  }
  
  moveToHome(){

  if(this.loginData.email.length > 0 && this.loginData.password.length > 0){

  this.presentLoadingDefault();

  var url = "http://www.mentorcard.de/api/login.php";
  let postData = new FormData();
  postData.append('username',this.loginData.email);
  postData.append('password',this.loginData.password);
  this.data = this.http.post(url,postData);

  this.data.subscribe(data =>{

  this.loading.dismiss();
 
  if(data['user']['status']!=null){

  this.loading.dismiss();

  this.addUser(data['user']['status'],data['user']['user_id']);

   // this.postReg();
  }else{

  this.loading.dismiss();

  }

  console.log(data);

  });


 }else{

  this.loading.dismiss();
  this.presentError();

 }
 this.loading.dismiss();

 }


 loadDev(){
    
  this.loading.dismiss();

    this.databaseProvider.getUsers().then(data=>{
      this.devs = data;

  
 
      if(data[0]['fp_id']!=null){

       
     //   alert(JSON.stringify(data));

      

        this.navCtrl.setRoot(DashboardPage);

      }else{

     

      }
    }).catch(this.loading.dismiss());

  
  }

   
  addUser(fp_id, user_id){
        
    this.databaseProvider.addDeveloper(fp_id, user_id).then(data =>{
      this.loadDev();

      document.location.href = 'index.html';
    // alert(data);
    })
    this.dev =  {};
  }

  presentError() {

    let alert = this.alertCtrl.create({
    title: 'Error',
    subTitle: 'Field is empty',
    buttons: ['Ok']
    });
    alert.present();

    }
    

  moveToForgot(){

    this.navCtrl.setRoot(ForgotPage);

  }
  moveToReg(){

    this.navCtrl.setRoot(RegisterPage);

  }

  postReg(){

    this.navCtrl.setRoot(DashboardPage);

  }

}
