import { BrowserModule } from '@angular/platform-browser';
import { ErrorHandler, NgModule } from '@angular/core';
import { IonicApp, IonicErrorHandler, IonicModule } from 'ionic-angular';

import { MyApp } from './app.component';
import { ListPage } from '../pages/list/list';

import { StatusBar } from '@ionic-native/status-bar';
import { SplashScreen } from '@ionic-native/splash-screen';
import { ChaptersPage } from '../pages/chapters/chapters';

import { ForgotPage } from '../pages/forgot/forgot';
import { LoginPage } from '../pages/login/login';
import { MockTestPage } from '../pages/mock-test/mock-test';
import { PracticePage } from '../pages/practice/practice';
import { QuestionTablePage } from '../pages/question-table/question-table';
import { RegisterPage } from '../pages/register/register';
import { ShopPage } from '../pages/shop/shop';
import { StatisticsPage } from '../pages/statistics/statistics';
import { StudentsPage } from '../pages/students/students';
import { SystemPage } from '../pages/system/system';
import { UserPage } from '../pages/user/user';
import { UserProfilePage } from '../pages/user-profile/user-profile';
import { ChooseLangPage } from '../pages/choose-lang/choose-lang';
import { MenuProvider } from '../providers/menu/menu';
import { HttpClientModule } from '@angular/common/http';
import {HttpModule} from '@angular/http';
import { EndTestMockPage } from '../pages/end-test-mock/end-test-mock';
import { DatabaseProvider } from '../providers/database/database';
import { DashboardPage } from '../pages/dashboard/dashboard';
import { IonicStorageModule } from '@ionic/storage';

import { SQLitePorter } from '@ionic-native/sqlite-porter';
import { SQLite } from '@ionic-native/sqlite';
import { ModalPastPage } from '../pages/modal-past/modal-past';
@NgModule({
  declarations: [
    MyApp,
    ModalPastPage,
    ListPage,
    ChaptersPage,
    DashboardPage,
    ForgotPage,
    LoginPage,
    MockTestPage,
    PracticePage,
    QuestionTablePage,
    RegisterPage,
    ShopPage,
    StatisticsPage,
    StudentsPage,
    SystemPage,
    UserPage,
    EndTestMockPage,
    UserProfilePage,
    ChooseLangPage
  ],
  imports: [
    BrowserModule,
    HttpModule,
    HttpClientModule,
    IonicStorageModule.forRoot(),
    IonicModule.forRoot(MyApp)
  ],
  bootstrap: [IonicApp],
  entryComponents: [
    MyApp,
    ListPage,
    ModalPastPage,
    ChaptersPage,
    DashboardPage,
    ForgotPage,
    EndTestMockPage,
    LoginPage,
    MockTestPage,
    PracticePage,
    QuestionTablePage,
    RegisterPage,
    ShopPage,
    StatisticsPage,
    StudentsPage,
    SystemPage,
    UserPage,
    UserProfilePage,
    ChooseLangPage
  ],
  providers: [
    StatusBar,
    SplashScreen,
    {provide: ErrorHandler, useClass: IonicErrorHandler},
   
    MenuProvider,
    DatabaseProvider,
    SQLitePorter,
    SQLite,
    

  ]
})
export class AppModule {}
