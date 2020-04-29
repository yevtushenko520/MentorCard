import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, AlertController } from 'ionic-angular';
import { HttpClient } from '@angular/common/http';
import {Observable } from 'rxjs/Observable';
import { DatabaseProvider } from '../../providers/database/database';
/**
 * Generated class for the UserProfilePage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-user-profile',
  templateUrl: 'user-profile.html',
})
export class UserProfilePage {

  loginData = { name:'', email:'',surename:'', bithday:'',phone:'',
  home_adress:'',mail_adress:'',password:'', next_level:''};
  data: Observable<any>;
  devs = [];
  dev = {};

  constructor(public navCtrl: NavController, public navParams: NavParams,public alertCtrl: AlertController,public http: HttpClient,
    private databaseProvider:DatabaseProvider) {


      var url = "http://www.mentorcard.de/api/get_info_student.php";
        let postData = new FormData();
        postData.append('id','25');
        this.data = this.http.post(url,postData);
      
        this.data.subscribe(data =>{
      
       
       
        if(data!=null){
     
           
          this.loginData.name = data['first_name'];
          this.loginData.surename = data['last_name'];
          this.loginData.password = data['day_birth'];
          this.loginData.phone = data['place_birth'];
          this.loginData.home_adress = data['phone_number'];
          this.loginData.mail_adress = data['email'];
          this.loginData.next_level = data['place_birth'];
        
        }else{
      
       
      
        }
      
        console.log(data);
      
        });


   

  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad UserProfilePage');
  }



  save(){
    let alert = this.alertCtrl.create({
      title: 'Sorry',
      subTitle: 'This is Demo version',
      buttons: ['Ok']
      });
      alert.present();
  }

}
