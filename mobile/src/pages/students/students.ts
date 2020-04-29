import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, AlertController } from 'ionic-angular';
import { Observable } from 'rxjs/Observable';
import { HttpClient } from '@angular/common/http';
/**
 * Generated class for the StudentsPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-students',
  templateUrl: 'students.html',
})
export class StudentsPage {


  url:string;
  data:Observable<any>;
  items:any;

  constructor(public navCtrl: NavController, public navParams: NavParams,private alertCtrl: AlertController,public http:HttpClient) {

    this.url = "http://www.mentorcard.de/api/get_students_from_school.php?id=4";
    this.getData();

  }

  getData(){
  
    this.data = this.http.get(this.url);
    this.data.subscribe(data => {
     
      this.items = data;
    
    })
 
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad StudentsPage');
  }

  presentError() {
    let alert = this.alertCtrl.create({
    title: 'Sorry',
    subTitle: 'This is Demo version',
    buttons: ['Ok']
    });
    alert.present();
    }

}
