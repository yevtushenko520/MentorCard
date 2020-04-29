webpackJsonp([15],{

/***/ 100:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return ChooseLangPage; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_ionic_angular__ = __webpack_require__(12);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__login_login__ = __webpack_require__(50);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__providers_database_database__ = __webpack_require__(65);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__dashboard_dashboard__ = __webpack_require__(63);
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};





/**
 * Generated class for the ChooseLangPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */
var ChooseLangPage = /** @class */ (function () {
    function ChooseLangPage(navCtrl, navParams, databaseProvider, loadingCtrl) {
        var _this = this;
        this.navCtrl = navCtrl;
        this.navParams = navParams;
        this.databaseProvider = databaseProvider;
        this.loadingCtrl = loadingCtrl;
        this.devs = [];
        this.dev = {};
        this.databaseProvider.getDatabaseState().subscribe(function (rdy) {
            if (rdy) {
                _this.presentLoadingDefault();
                _this.loadDev();
            }
        });
    }
    ChooseLangPage.prototype.loadDev = function () {
        var _this = this;
        this.databaseProvider.getUsers().then(function (data) {
            _this.devs = data;
            if (data[0]['user_id'] != null) {
                _this.loading.dismiss();
                _this.navCtrl.setRoot(__WEBPACK_IMPORTED_MODULE_4__dashboard_dashboard__["a" /* DashboardPage */]);
            }
            else {
                _this.loading.dismiss();
            }
        }).catch(this.loading.dismiss());
        this.loading.dismiss();
    };
    ChooseLangPage.prototype.presentLoadingDefault = function () {
        this.loading = this.loadingCtrl.create({
            content: 'Please wait...'
        });
        this.loading.present();
    };
    ChooseLangPage.prototype.postReg = function () {
        this.navCtrl.setRoot(__WEBPACK_IMPORTED_MODULE_2__login_login__["a" /* LoginPage */]);
    };
    ChooseLangPage = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["m" /* Component */])({
            selector: 'page-choose-lang',template:/*ion-inline-start:"F:\AppVilo\ALL_PROJECT\Juliia projects\Teory\mobile\MentorCard\src\pages\choose-lang\choose-lang.html"*/'<!--\n<ion-header>\n\n  <ion-navbar color="dark">\n    <ion-title>\n    <ion-icon name="md-contact"></ion-icon>\n    &nbsp;Sign In</ion-title>\n  </ion-navbar>\n\n</ion-header> -->\n\n\n<ion-content class="bg-img">\n\n  <div class="main-content">\n    <div padding text-center class="container-logo">\n      <img style="width: 30%;" src="assets/imgs/Logo_Web.png">\n    </div>\n    <div padding class="container-bottom" style="margin-top: 20px">   \n    \n\n        <ion-list>\n          <ion-item padding-right>\n            <ion-label>Languages</ion-label>\n  <ion-select [(ngModel)]="gender">\n    <ion-option value="f">English</ion-option>\n    <ion-option value="m3">Deutsch</ion-option>\n    <ion-option value="m2">Turk</ion-option>\n    <ion-option value="Italiano">Italiano</ion-option>\n    <ion-option value="Hrvatski">Hrvatski</ion-option>\n    <ion-option value="Español">Español</ion-option>\n    <ion-option value="Français">Français</ion-option>\n    <ion-option value="Português">Português</ion-option>\n    <ion-option value="Polski">Polski</ion-option>\n    <ion-option value="Română">Română</ion-option>\n    <ion-option value="Русский">Русский</ion-option>\n    <ion-option value="Ελληνικά">Ελληνικά</ion-option>\n    <ion-option value="2">हिंदी</ion-option>\n    <ion-option value="m4">ਪੰਜਾਬੀ</ion-option>\n    <ion-option value="m5">中文</ion-option>\n  </ion-select>\n          </ion-item>\n         \n        </ion-list>\n        <button type="submit" ion-button full color="dark" (click)="postReg()">Choose</button>\n   \n   \n  </div>\n\n\n\n  \n\n\n  </div>\n\n</ion-content> '/*ion-inline-end:"F:\AppVilo\ALL_PROJECT\Juliia projects\Teory\mobile\MentorCard\src\pages\choose-lang\choose-lang.html"*/,
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1_ionic_angular__["i" /* NavController */], __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["j" /* NavParams */], __WEBPACK_IMPORTED_MODULE_3__providers_database_database__["a" /* DatabaseProvider */], __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["f" /* LoadingController */]])
    ], ChooseLangPage);
    return ChooseLangPage;
}());

//# sourceMappingURL=choose-lang.js.map

/***/ }),

/***/ 101:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return EndTestMockPage; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_ionic_angular__ = __webpack_require__(12);
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};


/**
 * Generated class for the EndTestMockPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */
var EndTestMockPage = /** @class */ (function () {
    function EndTestMockPage(navCtrl, navParams, alertCtrl) {
        this.navCtrl = navCtrl;
        this.navParams = navParams;
        this.alertCtrl = alertCtrl;
        this.gig = 1;
    }
    EndTestMockPage.prototype.error = function () {
        var alert = this.alertCtrl.create({
            title: 'Sorry',
            subTitle: 'This is Demo version',
            buttons: ['Ok']
        });
        alert.present();
    };
    EndTestMockPage.prototype.next = function () {
        if (this.gig < 20) {
            this.gig = this.gig + 1;
            this.slides.slideNext();
        }
    };
    EndTestMockPage.prototype.prev = function () {
        if (this.gig > 1) {
            this.gig = this.gig - 1;
            this.slides.slidePrev();
        }
    };
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_8" /* ViewChild */])('slides'),
        __metadata("design:type", __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["l" /* Slides */])
    ], EndTestMockPage.prototype, "slides", void 0);
    EndTestMockPage = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["m" /* Component */])({
            selector: 'page-end-test-mock',template:/*ion-inline-start:"F:\AppVilo\ALL_PROJECT\Juliia projects\Teory\mobile\MentorCard\src\pages\end-test-mock\end-test-mock.html"*/'<!--\n  Generated template for the PracticePage page.\n\n  See http://ionicframework.com/docs/components/#navigation for more info on\n  Ionic pages and navigation.\n-->\n<ion-header>\n\n    <ion-navbar>\n        <button ion-button menuToggle>\n            <ion-icon name="menu"></ion-icon>\n          </button>\n      <ion-title *ngIf="gig==\'1\'">Basic Material/1.1.02.101</ion-title>\n      <ion-title *ngIf="gig==\'2\'">Basic Material/1.1.02.102</ion-title>\n      <ion-title *ngIf="gig==\'3\'">Basic Material/1.1.02.103</ion-title>\n      <ion-title *ngIf="gig==\'4\'">Basic Material/1.1.02.104</ion-title>\n      <ion-title *ngIf="gig==\'5\'">Basic Material/1.1.02.105</ion-title>\n      <ion-title *ngIf="gig==\'6\'">Basic Material/1.1.02.106</ion-title>\n      <ion-title *ngIf="gig==\'7\'">Basic Material/1.1.02.107</ion-title>\n      <ion-title *ngIf="gig==\'8\'">Basic Material/1.1.02.108</ion-title>\n      <ion-title *ngIf="gig==\'9\'">Basic Material/1.1.02.109</ion-title>\n      <ion-title *ngIf="gig==\'10\'">Basic Material/1.1.02.111</ion-title>\n      <ion-title *ngIf="gig==\'11\'">Basic Material/1.1.02.121</ion-title>\n      <ion-title *ngIf="gig==\'12\'">Basic Material/1.1.02.131</ion-title>\n      <ion-title *ngIf="gig==\'13\'">Basic Material/1.1.02.141</ion-title>\n      <ion-title *ngIf="gig==\'14\'">Basic Material/1.1.02.151</ion-title>\n      <ion-title *ngIf="gig==\'15\'">Basic Material/1.1.02.161</ion-title>\n      <ion-title *ngIf="gig==\'16\'">Basic Material/1.1.02.171</ion-title>\n      <ion-title *ngIf="gig==\'17\'">Basic Material/1.1.02.181</ion-title>\n      <ion-title *ngIf="gig==\'18\'">Basic Material/1.1.02.191</ion-title>\n      <ion-title *ngIf="gig==\'19\'">Basic Material/1.1.02.131</ion-title>\n      <ion-title *ngIf="gig==\'20\'">Basic Material/1.1.02.141</ion-title>\n      <ion-buttons end>\n          Points: 4\n        </ion-buttons>\n    </ion-navbar>\n  \n  </ion-header>\n  \n  \n  <ion-content >\n      <ion-list >\n      <ion-slides #slides>\n\n            <ion-slide >\n                    <ion-card>\n        \n                        <ion-item>\n                          \n                          <h2 >The cyclist in front of me will?</h2>\n                          <p >Quel doit ?tre votre comportement? </p>\n      \n                        </ion-item >\n                      \n                        \n                        <div id="over" style="margin: 5px; ">\n                            <img    style="width: 60%;" src="assets/imgs/stu_standart.png">\n                        </div>\n                      \n                        <ion-card-content>\n                            <ion-item>\n                                <ion-label>- turn to the left<br>( - qui sappr?te ? rouler sur lautre voie  )</ion-label>\n                                <ion-checkbox color="dark" checked="true" ></ion-checkbox>\n                              </ion-item>\n                              <ion-item>\n                                  <ion-label>- go to the other side of the road<br>( - qui sappr?te ? rouler sur lautre voie  )</ion-label>\n                                  <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                </ion-item>\n                                <ion-item>\n                                    <ion-label>- not impede me as i proceed<br>( - qui sappr?te ? rouler sur lautre voie  )</ion-label>\n                                    <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                  </ion-item>\n                        </ion-card-content>\n                      \n                        \n                      \n                      </ion-card>\n\n                      <ion-card>\n                        <button ion-item (click)="error()">\n                            <ion-icon name="md-close-circle" style="color: red" item-start></ion-icon>\n                            Failed\n                          </button>\n                       \n                      </ion-card>\n\n                </ion-slide>\n                <ion-slide >\n                        <ion-card>\n            \n                            <ion-item>\n                              \n                                    <h2 >The cyclist in front of me will?</h2>\n                                    <p >Quel doit ?tre votre comportement? </p>\n          \n                            </ion-item >\n                          \n                            \n                            <div id="over" style="margin: 5px; ">\n                                <img    style="width: 60%;" src="assets/imgs/stu_standart.png">\n                            </div>\n                          \n                            <ion-card-content>\n                                <ion-item>\n                                    <ion-label>- turn to the left<br>( - qui sappr?te ? rouler sur lautre voie  )</ion-label>\n                                    <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                  </ion-item>\n                                  <ion-item>\n                                      <ion-label>- go to the other side of the road<br>( - qui sappr?te ? rouler sur lautre voie  )</ion-label>\n                                      <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                    </ion-item>\n                                    <ion-item>\n                                        <ion-label>- not impede me as i proceed<br>( - qui sappr?te ? rouler sur lautre voie  )</ion-label>\n                                        <ion-checkbox color="dark" checked="true" ></ion-checkbox>\n                                      </ion-item>\n                            </ion-card-content>\n                          \n                            \n                          \n                          </ion-card>\n\n                          <ion-card>\n                            <button ion-item (click)="error()">\n                                <ion-icon name="md-close-circle" style="color: red" item-start></ion-icon>\n                                Failed\n                              </button>\n                           \n                          </ion-card>\n                    </ion-slide>\n                    <ion-slide >\n                            <ion-card>\n                \n                                <ion-item>\n                                  \n                                        <h2 >The cyclist in front of me will?</h2>\n                                        <p >Quel doit ?tre votre comportement? </p>\n              \n                                </ion-item >\n                              \n                                \n                                <div id="over" style="margin: 5px; ">\n                                    <img    style="width: 60%;" src="assets/imgs/stu_standart.png">\n                                </div>\n                              \n                                <ion-card-content>\n                                    <ion-item>\n                                        <ion-label>- turn to the left<br>( - qui sappr?te ? rouler sur lautre voie  )</ion-label>\n                                        <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                      </ion-item>\n                                      <ion-item>\n                                          <ion-label>- go to the other side of the road<br>( - qui sappr?te ? rouler sur lautre voie  )</ion-label>\n                                          <ion-checkbox color="dark" checked="true" ></ion-checkbox>\n                                        </ion-item>\n                                        <ion-item>\n                                            <ion-label>- not impede me as i proceed<br>( - qui sappr?te ? rouler sur lautre voie  )</ion-label>\n                                            <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                          </ion-item>\n                                </ion-card-content>\n                              \n                                \n                              \n                              </ion-card>\n\n\n                              <ion-card>\n                                <button ion-item (click)="error()">\n                                    <ion-icon name="ios-arrow-dropdown-circle" style="color: green" item-start></ion-icon>\n                                    Done\n                                  </button>\n                               \n                              </ion-card>\n                        </ion-slide>\n                        <ion-slide >\n                                <ion-card>\n                    \n                                    <ion-item>\n                                      \n                                            <h2 >The cyclist in front of me will?</h2>\n                                            <p >Quel doit ?tre votre comportement? </p>\n                  \n                                    </ion-item >\n                                  \n                                    \n                                    <div id="over" style="margin: 5px; ">\n                                        <img    style="width: 60%;" src="assets/imgs/stu_standart.png">\n                                    </div>\n                                  \n                                    <ion-card-content>\n                                        <ion-item>\n                                            <ion-label>- turn to the left<br>( - qui sappr?te ? rouler sur lautre voie  )</ion-label>\n                                            <ion-checkbox color="dark" checked="true" ></ion-checkbox>\n                                          </ion-item>\n                                          <ion-item>\n                                              <ion-label>- go to the other side of the road<br>( - qui sappr?te ? rouler sur lautre voie  )</ion-label>\n                                              <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                            </ion-item>\n                                            <ion-item>\n                                                <ion-label>- not impede me as i proceed<br>( - qui sappr?te ? rouler sur lautre voie  )</ion-label>\n                                                <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                              </ion-item>\n                                    </ion-card-content>\n                                  \n                                    \n                                  \n                                  </ion-card>\n                                  <ion-card>\n                                    <button ion-item (click)="error()">\n                                        <ion-icon name="ios-arrow-dropdown-circle" style="color: green" item-start></ion-icon>\n                                        Done\n                                      </button>\n                                   \n                                  </ion-card>\n                            </ion-slide>\n                            <ion-slide >\n                                    <ion-card>\n                        \n                                        <ion-item>\n                                          \n                                                <h2 >The cyclist in front of me will?</h2>\n                                                <p >Quel doit ?tre votre comportement? </p>\n                      \n                                        </ion-item >\n                                      \n                                        \n                                        <div id="over" style="margin: 5px; ">\n                                            <img    style="width: 60%;" src="assets/imgs/stu_standart.png">\n                                        </div>\n                                      \n                                        <ion-card-content>\n                                            <ion-item>\n                                                <ion-label>- turn to the left<br>( - qui sappr?te ? rouler sur lautre voie  )</ion-label>\n                                                <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                              </ion-item>\n                                              <ion-item>\n                                                  <ion-label>- go to the other side of the road<br>( - qui sappr?te ? rouler sur lautre voie  )</ion-label>\n                                                  <ion-checkbox color="dark" checked="true" ></ion-checkbox>\n                                                </ion-item>\n                                                <ion-item>\n                                                    <ion-label>- not impede me as i proceed<br>( - qui sappr?te ? rouler sur lautre voie  )</ion-label>\n                                                    <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                  </ion-item>\n                                        </ion-card-content>\n                                      \n                                        \n                                      \n                                      </ion-card>\n                                      <ion-card>\n                                        <button ion-item (click)="error()">\n                                            <ion-icon name="ios-arrow-dropdown-circle" style="color: green" item-start></ion-icon>\n                                            Done\n                                          </button>\n                                       \n                                      </ion-card>\n                                </ion-slide>\n                                <ion-slide >\n                                        <ion-card>\n                            \n                                            <ion-item>\n                                              \n                                                    <h2 >The cyclist in front of me will?</h2>\n                                                    <p >Quel doit ?tre votre comportement? </p>\n                          \n                                            </ion-item >\n                                          \n                                            \n                                            <div id="over" style="margin: 5px; ">\n                                                <img    style="width: 60%;" src="assets/imgs/stu_standart.png">\n                                            </div>\n                                          \n                                            <ion-card-content>\n                                                <ion-item>\n                                                    <ion-label>- turn to the left<br>( - qui sappr?te ? rouler sur lautre voie  )</ion-label>\n                                                    <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                  </ion-item>\n                                                  <ion-item>\n                                                      <ion-label>- go to the other side of the road<br>( - qui sappr?te ? rouler sur lautre voie  )</ion-label>\n                                                      <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                    </ion-item>\n                                                    <ion-item>\n                                                        <ion-label>- not impede me as i proceed<br>( - qui sappr?te ? rouler sur lautre voie  )</ion-label>\n                                                        <ion-checkbox color="dark" checked="true"  ></ion-checkbox>\n                                                      </ion-item>\n                                            </ion-card-content>\n                                          \n                                            \n                                          \n                                          </ion-card>\n\n                                          <ion-card>\n                                            <button ion-item (click)="error()">\n                                                <ion-icon name="md-close-circle" style="color: red" item-start></ion-icon>\n                                                Failed\n                                              </button>\n                                           \n                                          </ion-card>\n\n                                    </ion-slide>\n                                    <ion-slide >\n                                            <ion-card>\n                                \n                                                <ion-item>\n                                                  \n                                                        <h2 >The cyclist in front of me will?</h2>\n                                                        <p >Quel doit ?tre votre comportement? </p>\n                              \n                                                </ion-item >\n                                              \n                                                \n                                                <div id="over" style="margin: 5px; ">\n                                                    <img    style="width: 60%;" src="assets/imgs/stu_standart.png">\n                                                </div>\n                                              \n                                                <ion-card-content>\n                                                    <ion-item>\n                                                        <ion-label>- turn to the left<br>( - qui sappr?te ? rouler sur lautre voie  )</ion-label>\n                                                        <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                      </ion-item>\n                                                      <ion-item>\n                                                          <ion-label>- go to the other side of the road<br>( - qui sappr?te ? rouler sur lautre voie  )</ion-label>\n                                                          <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                        </ion-item>\n                                                        <ion-item>\n                                                            <ion-label>- not impede me as i proceed<br>( - qui sappr?te ? rouler sur lautre voie  )</ion-label>\n                                                            <ion-checkbox color="dark" checked="true" ></ion-checkbox>\n                                                          </ion-item>\n                                                </ion-card-content>\n                                              \n                                                \n                                              \n                                              </ion-card>\n                                              <ion-card>\n                                                <button ion-item (click)="error()">\n                                                    <ion-icon name="md-close-circle" style="color: red" item-start></ion-icon>\n                                                    Failed\n                                                  </button>\n                                               \n                                              </ion-card>\n                                        </ion-slide>\n                                        <ion-slide >\n                                                <ion-card>\n                                    \n                                                    <ion-item>\n                                                      \n                                                            <h2 >The cyclist in front of me will?</h2>\n                                                            <p >Quel doit ?tre votre comportement? </p>\n                                  \n                                                    </ion-item >\n                                                  \n                                                    \n                                                    <div id="over" style="margin: 5px; ">\n                                                        <img    style="width: 60%;" src="assets/imgs/stu_standart.png">\n                                                    </div>\n                                                  \n                                                    <ion-card-content>\n                                                        <ion-item>\n                                                            <ion-label>- turn to the left<br>( - qui sappr?te ? rouler sur lautre voie  )</ion-label>\n                                                            <ion-checkbox color="dark" checked="true" ></ion-checkbox>\n                                                          </ion-item>\n                                                          <ion-item>\n                                                              <ion-label>- go to the other side of the road<br>( - qui sappr?te ? rouler sur lautre voie  )</ion-label>\n                                                              <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                            </ion-item>\n                                                            <ion-item>\n                                                                <ion-label>- not impede me as i proceed<br>( - qui sappr?te ? rouler sur lautre voie  )</ion-label>\n                                                                <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                              </ion-item>\n                                                    </ion-card-content>\n                                                  \n                                                    \n                                                  \n                                                  </ion-card>\n                                                  <ion-card>\n                                                    <button ion-item (click)="error()">\n                                                        <ion-icon name="ios-arrow-dropdown-circle" style="color: green" item-start></ion-icon>\n                                                        Done\n                                                      </button>\n                                                   \n                                                  </ion-card>\n                                            </ion-slide>\n                                            <ion-slide >\n                                                    <ion-card>\n                                        \n                                                        <ion-item>\n                                                          \n                                                                <h2 >The cyclist in front of me will?</h2>\n                                                                <p >Quel doit ?tre votre comportement? </p>\n                                      \n                                                        </ion-item >\n                                                      \n                                                        \n                                                        <div id="over" style="margin: 5px; ">\n                                                            <img    style="width: 60%;" src="assets/imgs/stu_standart.png">\n                                                        </div>\n                                                      \n                                                        <ion-card-content>\n                                                            <ion-item>\n                                                                <ion-label>- turn to the left<br>( - qui sappr?te ? rouler sur lautre voie  )</ion-label>\n                                                                <ion-checkbox color="dark" checked="true" ></ion-checkbox>\n                                                              </ion-item>\n                                                              <ion-item>\n                                                                  <ion-label>- go to the other side of the road<br>( - qui sappr?te ? rouler sur lautre voie  )</ion-label>\n                                                                  <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                </ion-item>\n                                                                <ion-item>\n                                                                    <ion-label>- not impede me as i proceed<br>( - qui sappr?te ? rouler sur lautre voie  )</ion-label>\n                                                                    <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                  </ion-item>\n                                                        </ion-card-content>\n                                                      \n                                                        \n                                                      \n                                                      </ion-card>\n                                                      <ion-card>\n                                                        <button ion-item (click)="error()">\n                                                            <ion-icon name="ios-arrow-dropdown-circle" style="color: green" item-start></ion-icon>\n                                                            Done\n                                                          </button>\n                                                       \n                                                      </ion-card>\n                                                </ion-slide>\n                                                <ion-slide >\n                                                        <ion-card>\n                                            \n                                                            <ion-item>\n                                                              \n                                                                    <h2 >The cyclist in front of me will?</h2>\n                                                                    <p >Quel doit ?tre votre comportement? </p>\n                                          \n                                                            </ion-item >\n                                                          \n                                                            \n                                                            <div id="over" style="margin: 5px; ">\n                                                                <img    style="width: 60%;" src="assets/imgs/stu_standart.png">\n                                                            </div>\n                                                          \n                                                            <ion-card-content>\n                                                                <ion-item>\n                                                                    <ion-label>- turn to the left<br>( - qui sappr?te ? rouler sur lautre voie  )</ion-label>\n                                                                    <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                  </ion-item>\n                                                                  <ion-item>\n                                                                      <ion-label>- go to the other side of the road<br>( - qui sappr?te ? rouler sur lautre voie  )</ion-label>\n                                                                      <ion-checkbox color="dark" checked="true" ></ion-checkbox>\n                                                                    </ion-item>\n                                                                    <ion-item>\n                                                                        <ion-label>- not impede me as i proceed<br>( - qui sappr?te ? rouler sur lautre voie  )</ion-label>\n                                                                        <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                      </ion-item>\n                                                            </ion-card-content>\n                                                          \n                                                            \n                                                          \n                                                          </ion-card>\n                                                          <ion-card>\n                                                            <button ion-item (click)="error()">\n                                                                <ion-icon name="ios-arrow-dropdown-circle" style="color: green" item-start></ion-icon>\n                                                                Done\n                                                              </button>\n                                                           \n                                                          </ion-card>\n                                                    </ion-slide>\n                                                    <ion-slide >\n                                                            <ion-card>\n                                                \n                                                                <ion-item>\n                                                                  \n                                                                        <h2 >The cyclist in front of me will?</h2>\n                                                                        <p >Quel doit ?tre votre comportement? </p>\n                                                                </ion-item >\n                                                              \n                                                                \n                                                                <div id="over" style="margin: 5px; ">\n                                                                    <img    style="width: 60%;" src="assets/imgs/stu_standart.png">\n                                                                </div>\n                                                              \n                                                                <ion-card-content>\n                                                                    <ion-item>\n                                                                        <ion-label>- turn to the left<br>( - qui sappr?te ? rouler sur lautre voie  )</ion-label>\n                                                                        <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                      </ion-item>\n                                                                      <ion-item>\n                                                                          <ion-label>- go to the other side of the road<br>( - qui sappr?te ? rouler sur lautre voie  )</ion-label>\n                                                                          <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                        </ion-item>\n                                                                        <ion-item>\n                                                                            <ion-label>- not impede me as i proceed<br>( - qui sappr?te ? rouler sur lautre voie  )</ion-label>\n                                                                            <ion-checkbox color="dark" checked="true" ></ion-checkbox>\n                                                                          </ion-item>\n                                                                </ion-card-content>\n                                                              \n                                                                \n                                                              \n                                                              </ion-card>\n                                                              <ion-card>\n                                                                <button ion-item (click)="error()">\n                                                                    <ion-icon name="md-close-circle" style="color: red" item-start></ion-icon>\n                                                                    Failed\n                                                                  </button>\n                                                               \n                                                              </ion-card>\n                                                        </ion-slide>\n                                                        <ion-slide >\n                                                                <ion-card>\n                                                    \n                                                                    <ion-item>\n                                                                      \n                                                                            <h2 >The cyclist in front of me will?</h2>\n                                                                            <p >Quel doit ?tre votre comportement? </p>\n                                                  \n                                                                    </ion-item >\n                                                                  \n                                                                    \n                                                                    <div id="over" style="margin: 5px; ">\n                                                                        <img    style="width: 60%;" src="assets/imgs/stu_standart.png">\n                                                                    </div>\n                                                                  \n                                                                    <ion-card-content>\n                                                                        <ion-item>\n                                                                            <ion-label>- turn to the left<br>( - qui sappr?te ? rouler sur lautre voie  )</ion-label>\n                                                                            <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                          </ion-item>\n                                                                          <ion-item>\n                                                                              <ion-label>- go to the other side of the road<br>( - qui sappr?te ? rouler sur lautre voie  )</ion-label>\n                                                                              <ion-checkbox color="dark" checked="true" ></ion-checkbox>\n                                                                            </ion-item>\n                                                                            <ion-item>\n                                                                                <ion-label>- not impede me as i proceed<br>( - qui sappr?te ? rouler sur lautre voie  )</ion-label>\n                                                                                <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                              </ion-item>\n                                                                    </ion-card-content>\n                                                                  \n                                                                    \n                                                                  \n                                                                  </ion-card>\n                                                                  <ion-card>\n                                                                    <button ion-item (click)="error()">\n                                                                        <ion-icon name="md-close-circle" style="color: red" item-start></ion-icon>\n                                                                        Failed\n                                                                      </button>\n                                                                   \n                                                                  </ion-card>\n                                                            </ion-slide>\n                                                            <ion-slide >\n                                                                    <ion-card>\n                                                        \n                                                                        <ion-item>\n                                                                          \n                                                                                <h2 >The cyclist in front of me will?</h2>\n                                                                                <p >Quel doit ?tre votre comportement? </p>\n                                                      \n                                                                        </ion-item >\n                                                                      \n                                                                        \n                                                                        <div id="over" style="margin: 5px; ">\n                                                                            <img    style="width: 60%;" src="assets/imgs/stu_standart.png">\n                                                                        </div>\n                                                                      \n                                                                        <ion-card-content>\n                                                                            <ion-item>\n                                                                                <ion-label>- turn to the left<br>( - qui sappr?te ? rouler sur lautre voie  )</ion-label>\n                                                                                <ion-checkbox color="dark" checked="true" ></ion-checkbox>\n                                                                              </ion-item>\n                                                                              <ion-item>\n                                                                                  <ion-label>- go to the other side of the road<br>( - qui sappr?te ? rouler sur lautre voie  )</ion-label>\n                                                                                  <ion-checkbox color="dark" checked="true" ></ion-checkbox>\n                                                                                </ion-item>\n                                                                                <ion-item>\n                                                                                    <ion-label>- not impede me as i proceed<br>( - qui sappr?te ? rouler sur lautre voie  )</ion-label>\n                                                                                    <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                                  </ion-item>\n                                                                        </ion-card-content>\n                                                                      \n                                                                        \n                                                                      \n                                                                      </ion-card>\n                                                                      <ion-card>\n                                                                        <button ion-item (click)="error()">\n                                                                            <ion-icon name="ios-arrow-dropdown-circle" style="color: green" item-start></ion-icon>\n                                                                            Done\n                                                                          </button>\n                                                                       \n                                                                      </ion-card>\n                                                                </ion-slide>\n                                                                <ion-slide >\n                                                                        <ion-card>\n                                                            \n                                                                            <ion-item>\n                                                                              \n                                                                                    <h2 >The cyclist in front of me will?</h2>\n                                                                                    <p >Quel doit ?tre votre comportement? </p>\n                                                          \n                                                                            </ion-item >\n                                                                          \n                                                                            \n                                                                            <div id="over" style="margin: 5px; ">\n                                                                                <img    style="width: 60%;" src="assets/imgs/stu_standart.png">\n                                                                            </div>\n                                                                          \n                                                                            <ion-card-content>\n                                                                                <ion-item>\n                                                                                    <ion-label>- turn to the left<br>( - qui sappr?te ? rouler sur lautre voie  )</ion-label>\n                                                                                    <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                                  </ion-item>\n                                                                                  <ion-item>\n                                                                                      <ion-label>- go to the other side of the road<br>( - qui sappr?te ? rouler sur lautre voie  )</ion-label>\n                                                                                      <ion-checkbox color="dark" checked="true" ></ion-checkbox>\n                                                                                    </ion-item>\n                                                                                    <ion-item>\n                                                                                        <ion-label>- not impede me as i proceed<br>( - qui sappr?te ? rouler sur lautre voie  )</ion-label>\n                                                                                        <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                                      </ion-item>\n                                                                            </ion-card-content>\n                                                                          \n                                                                            \n                                                                          \n                                                                          </ion-card>\n                                                                          <ion-card>\n                                                                            <button ion-item (click)="error()">\n                                                                                <ion-icon name="md-close-circle" style="color: red" item-start></ion-icon>\n                                                                                Failed\n                                                                              </button>\n                                                                           \n                                                                          </ion-card>\n                                                                    </ion-slide>\n                                                                    <ion-slide >\n                                                                            <ion-card>\n                                                                \n                                                                                <ion-item>\n                                                                                  \n                                                                                        <h2 >The cyclist in front of me will?</h2>\n                                                                                        <p >Quel doit ?tre votre comportement? </p>\n                                                              \n                                                                                </ion-item >\n                                                                              \n                                                                                \n                                                                                <div id="over" style="margin: 5px; ">\n                                                                                    <img    style="width: 60%;" src="assets/imgs/stu_standart.png">\n                                                                                </div>\n                                                                              \n                                                                                <ion-card-content>\n                                                                                    <ion-item>\n                                                                                        <ion-label>- turn to the left<br>( - qui sappr?te ? rouler sur lautre voie  )</ion-label>\n                                                                                        <ion-checkbox color="dark" checked="true" ></ion-checkbox>\n                                                                                      </ion-item>\n                                                                                      <ion-item>\n                                                                                          <ion-label>- go to the other side of the road<br>( - qui sappr?te ? rouler sur lautre voie  )</ion-label>\n                                                                                          <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                                        </ion-item>\n                                                                                        <ion-item>\n                                                                                            <ion-label>- not impede me as i proceed<br>( - qui sappr?te ? rouler sur lautre voie  )</ion-label>\n                                                                                            <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                                          </ion-item>\n                                                                                </ion-card-content>\n                                                                              \n                                                                                \n                                                                              \n                                                                              </ion-card>\n                                                                              <ion-card>\n                                                                                <button ion-item (click)="error()">\n                                                                                    <ion-icon name="md-close-circle" style="color: red" item-start></ion-icon>\n                                                                                    Failed\n                                                                                  </button>\n                                                                               \n                                                                              </ion-card>\n                                                                        </ion-slide>\n                                                                        <ion-slide >\n                                                                                <ion-card>\n                                                                    \n                                                                                    <ion-item>\n                                                                                      \n                                                                                            <h2 >The cyclist in front of me will?</h2>\n                                                                                            <p >Quel doit ?tre votre comportement? </p>\n                                                                  \n                                                                                    </ion-item >\n                                                                                  \n                                                                                    \n                                                                                    <div id="over" style="margin: 5px; ">\n                                                                                        <img    style="width: 60%;" src="assets/imgs/stu_standart.png">\n                                                                                    </div>\n                                                                                  \n                                                                                    <ion-card-content>\n                                                                                        <ion-item>\n                                                                                            <ion-label>- turn to the left<br>( - qui sappr?te ? rouler sur lautre voie  )</ion-label>\n                                                                                            <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                                          </ion-item>\n                                                                                          <ion-item>\n                                                                                              <ion-label>- go to the other side of the road<br>( - qui sappr?te ? rouler sur lautre voie  )</ion-label>\n                                                                                              <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                                            </ion-item>\n                                                                                            <ion-item>\n                                                                                                <ion-label>- not impede me as i proceed<br>( - qui sappr?te ? rouler sur lautre voie  )</ion-label>\n                                                                                                <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                                              </ion-item>\n                                                                                    </ion-card-content>\n                                                                                  \n                                                                                    \n                                                                                  \n                                                                                  </ion-card>\n                                                                                  <ion-card>\n                                                                                    <button ion-item (click)="error()">\n                                                                                        <ion-icon name="md-close-circle" style="color: red" item-start></ion-icon>\n                                                                                        Failed\n                                                                                      </button>\n                                                                                   \n                                                                                  </ion-card>\n                                                                            </ion-slide>\n                                                                            <ion-slide >\n                                                                                    <ion-card>\n                                                                        \n                                                                                        <ion-item>\n                                                                                          \n                                                                                                <h2 >The cyclist in front of me will?</h2>\n                                                                                                <p >Quel doit ?tre votre comportement? </p>\n                                                                      \n                                                                                        </ion-item >\n                                                                                      \n                                                                                        \n                                                                                        <div id="over" style="margin: 5px; ">\n                                                                                            <img    style="width: 60%;" src="assets/imgs/stu_standart.png">\n                                                                                        </div>\n                                                                                      \n                                                                                        <ion-card-content>\n                                                                                            <ion-item>\n                                                                                                <ion-label>- turn to the left<br>( - qui sappr?te ? rouler sur lautre voie  )</ion-label>\n                                                                                                <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                                              </ion-item>\n                                                                                              <ion-item>\n                                                                                                  <ion-label>- go to the other side of the road<br>( - qui sappr?te ? rouler sur lautre voie  )</ion-label>\n                                                                                                  <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                                                </ion-item>\n                                                                                                <ion-item>\n                                                                                                    <ion-label>- not impede me as i proceed<br>( - qui sappr?te ? rouler sur lautre voie  )</ion-label>\n                                                                                                    <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                                                  </ion-item>\n                                                                                        </ion-card-content>\n                                                                                      \n                                                                                        \n                                                                                      \n                                                                                      </ion-card>\n                                                                                      <ion-card>\n                                                                                        <button ion-item (click)="error()">\n                                                                                            <ion-icon name="md-close-circle" style="color: red" item-start></ion-icon>\n                                                                                            Failed\n                                                                                          </button>\n                                                                                       \n                                                                                      </ion-card>\n                                                                                </ion-slide>\n\n  \n          <ion-slide >\n              <ion-card>\n  \n                  <ion-item>\n                    \n                        <h2 >The cyclist in front of me will?</h2>\n                        <p >Quel doit ?tre votre comportement? </p>\n\n                  </ion-item >\n                \n                  \n                  <div id="over" style="margin: 5px; ">\n                      <img    style="width: 60%;" src="assets/imgs/stu_standart.png">\n                  </div>\n                \n                  <ion-card-content>\n                      <ion-item>\n                          <ion-label>- turn to the left<br>( - qui sappr?te ? rouler sur lautre voie  )</ion-label>\n                          <ion-checkbox color="dark" checked="true" ></ion-checkbox>\n                        </ion-item>\n                        <ion-item>\n                            <ion-label>- go to the other side of the road<br>( - qui sappr?te ? rouler sur lautre voie  )</ion-label>\n                            <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                          </ion-item>\n                          <ion-item>\n                              <ion-label>- not impede me as i proceed<br>( - qui sappr?te ? rouler sur lautre voie  )</ion-label>\n                              <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                            </ion-item>\n                  </ion-card-content>\n                \n                  \n                \n                </ion-card>\n                \n<ion-card>\n    <button ion-item (click)="error()">\n        <ion-icon name="ios-arrow-dropdown-circle" style="color: green" item-start></ion-icon>\n        Done\n      </button>\n   \n  </ion-card>\n          </ion-slide>\n        \n          <ion-slide >\n              <ion-card>\n  \n                  <ion-item>\n                    \n                        <h2 >The cyclist in front of me will?</h2>\n                        <p >Quel doit ?tre votre comportement? </p>\n    \n                  </ion-item>\n                \n                  <div id="over" style="margin: 5px; ">\n                      <img    style="width: 60%;" src="assets/imgs/stu_standart.png">\n                  </div>\n                  <ion-card-content>\n                      <ion-item>\n                          <ion-label>- turn to the left<br>( - qui sappr?te ? rouler sur lautre voie  )</ion-label>\n                          <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                        </ion-item>\n                        <ion-item>\n                            <ion-label>- go to the other side of the road<br>( - qui sappr?te ? rouler sur lautre voie  )</ion-label>\n                            <ion-checkbox color="dark" checked="true" ></ion-checkbox>\n                          </ion-item>\n                          <ion-item>\n                              <ion-label>- not impede me as i proceed<br>( - qui sappr?te ? rouler sur lautre voie  )</ion-label>\n                              <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                            </ion-item>\n                  </ion-card-content>\n                \n                  \n                \n                </ion-card>\n                \n<ion-card>\n    <button ion-item (click)="error()">\n        <ion-icon name="ios-arrow-dropdown-circle" style="color: green" item-start></ion-icon>\n        Done\n      </button>\n   \n  </ion-card>\n          </ion-slide>\n        \n          <ion-slide >\n              <ion-card>\n  \n                  <ion-item>\n                    \n                        <h2 >The cyclist in front of me will?</h2>\n                        <p >Quel doit ?tre votre comportement? </p>\n    \n                  </ion-item>\n                \n                  <div id="over" style="margin: 5px; ">\n                      <img style="width: 60%;" src="assets/imgs/stu_standart.png">\n                  </div>\n                \n                  <ion-card-content>\n                      <ion-item>\n                          <ion-label>- turn to the left<br>( - qui sappr?te ? rouler sur lautre voie  )</ion-label>\n                          <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                        </ion-item>\n                        <ion-item>\n                            <ion-label>- go to the other side of the road<br>( - qui sappr?te ? rouler sur lautre voie  )</ion-label>\n                            <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                          </ion-item>\n                          <ion-item>\n                              <ion-label>- not impede me as i proceed<br>( - qui sappr?te ? rouler sur lautre voie  )</ion-label>\n                              <ion-checkbox color="dark" checked="true" ></ion-checkbox>\n                            </ion-item>\n                  </ion-card-content>\n                \n                  \n                \n                </ion-card>\n                \n<ion-card>\n    <button ion-item (click)="error()">\n        <ion-icon name="ios-arrow-dropdown-circle" style="color: green" item-start></ion-icon>\n        Done\n      </button>\n   \n  </ion-card>\n          </ion-slide>\n        \n        </ion-slides>\n  \n  \n        <ion-footer align-title="center">\n            <ion-grid >\n                <ion-row>\n                  <ion-col *ngIf="gig==\'1\'">\n                   Question 1 of 20\n                  </ion-col>\n                  <ion-col *ngIf="gig==\'2\'">\n                    Question   2 of 20\n                    </ion-col>\n                    <ion-col *ngIf="gig==\'3\'">\n                        Question   3 of 20\n                    </ion-col>\n                    <ion-col *ngIf="gig==\'4\'">\n                        Question    4 of 20\n                      </ion-col>\n                      <ion-col *ngIf="gig==\'5\'">\n                        Question   5 of 20\n                      </ion-col>\n                      <ion-col *ngIf="gig==\'6\'">\n                        Question    6 of 20\n                      </ion-col>\n                      <ion-col *ngIf="gig==\'7\'">\n                        Question    7 of 20\n                      </ion-col>\n                      <ion-col *ngIf="gig==\'8\'">\n                        Question   8 of 20\n                      </ion-col>\n                      <ion-col *ngIf="gig==\'9\'">\n                        Question   9 of 20\n                      </ion-col>\n                      <ion-col *ngIf="gig==\'10\'">\n                        Question   10 of 20\n                      </ion-col>\n                      <ion-col *ngIf="gig==\'11\'">\n                        Question   11 of 20\n                      </ion-col>\n                      <ion-col *ngIf="gig==\'12\'">\n                        Question   12 of 20\n                      </ion-col>\n                      <ion-col *ngIf="gig==\'13\'">\n                        Question  13 of 20\n                      </ion-col>\n                      <ion-col *ngIf="gig==\'14\'">\n                        Question 14 of 20\n                      </ion-col>\n                      <ion-col *ngIf="gig==\'15\'">\n                        Question  15 of 20\n                      </ion-col>\n                      <ion-col *ngIf="gig==\'16\'">\n                        Question  16 of 20\n                      </ion-col>\n                      <ion-col *ngIf="gig==\'17\'">\n                        Question   17 of 20\n                      </ion-col>\n                      <ion-col *ngIf="gig==\'18\'">\n                        Question   18 of 20\n                      </ion-col>\n                      <ion-col *ngIf="gig==\'19\'">\n                        Question    19 of 20\n                      </ion-col>\n                      <ion-col *ngIf="gig==\'20\'">\n                        Question  20 of 20\n                      </ion-col>\n                  <ion-col >\n                    \n                  </ion-col>\n                  \n\n\n                </ion-row>\n                \n              </ion-grid>\n  \n            <ion-grid text-center>\n                <ion-row>\n                    <ion-col>\n                      <button ion-button style="background-color: #FFA500" (click)="prev()">< Previous</button>\n                    </ion-col>\n                    <ion-col>\n                        <button ion-button color="danger" (click)="showConfirm()">Submit</button>\n                    </ion-col>\n                    <ion-col>\n                        <button ion-button color="secondary" (click)="next()">Next ></button>\n                    </ion-col>\n                  </ion-row>\n               \n              </ion-grid>\n  \n  \n          </ion-footer>\n        \n  \n      </ion-list >\n  \n      <style>\n      \n      .card-content-ios {\n       padding: 0px;\n      font-size: 1.4rem;\n      line-height: 1.4;\n  }\n  \n  #over img {\n      margin-left: auto;\n      margin-right: auto;\n      display: block;\n  }\n  \n      </style>\n  \n  </ion-content>\n  '/*ion-inline-end:"F:\AppVilo\ALL_PROJECT\Juliia projects\Teory\mobile\MentorCard\src\pages\end-test-mock\end-test-mock.html"*/,
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1_ionic_angular__["i" /* NavController */], __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["j" /* NavParams */], __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["a" /* AlertController */]])
    ], EndTestMockPage);
    return EndTestMockPage;
}());

//# sourceMappingURL=end-test-mock.js.map

/***/ }),

/***/ 166:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return ChaptersPage; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_ionic_angular__ = __webpack_require__(12);
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};


/**
 * Generated class for the ChaptersPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */
var ChaptersPage = /** @class */ (function () {
    function ChaptersPage(navCtrl, navParams, alertCtrl) {
        this.navCtrl = navCtrl;
        this.navParams = navParams;
        this.alertCtrl = alertCtrl;
    }
    ChaptersPage.prototype.ionViewDidLoad = function () {
        console.log('ionViewDidLoad ChaptersPage');
    };
    ChaptersPage.prototype.presentError = function () {
        var alert = this.alertCtrl.create({
            title: 'Sorry',
            subTitle: 'This is Demo version',
            buttons: ['Ok']
        });
        alert.present();
    };
    ChaptersPage = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["m" /* Component */])({
            selector: 'page-chapters',template:/*ion-inline-start:"F:\AppVilo\ALL_PROJECT\Juliia projects\Teory\mobile\MentorCard\src\pages\chapters\chapters.html"*/'<!--\n  Generated template for the ChaptersPage page.\n\n  See http://ionicframework.com/docs/components/#navigation for more info on\n  Ionic pages and navigation.\n-->\n<ion-header>\n\n  <ion-navbar>\n      <button ion-button menuToggle>\n          <ion-icon name="menu"></ion-icon>\n        </button>\n    <ion-title>Chapters</ion-title>\n  </ion-navbar>\n\n</ion-header>\n\n\n<ion-content >\n\n    <ion-card >\n\n        <ion-card-header class="title_class">\n            Chapters\n          </ion-card-header>\n\n        <ion-card-content>\n          <p>Username: reseller</p>\n          <p>Category:</p><ion-badge item-end>B-Cars</ion-badge>\n        </ion-card-content>\n          </ion-card>\n\n\n          <ion-card>\n              <ion-card-header class="title_class">\n                  Questions knowledge\n              </ion-card-header>\n            \n              <ion-list>\n                <button ion-item (click)="presentError()">\n                \n                    Einschränkungen der körperlichen Fähigkeiten\n                  <p>108 questions</p>\n                </button>\n            \n                <button ion-item (click)="presentError()">\n                \n                    Fahrerideale/Fahrerrollen/Driver ideals / driver rolls\n                  <p>108 questions</p>\n                </button>\n            \n                <button ion-item (click)="presentError()">\n                 \n                    Life long learning\n                  <p>108 questions</p>\n                </button>\n            \n                <button ion-item (click)="presentError()">\n                \n                    Persönliche Voraussetzungen / Risikofaktor Mensch\n                  <p>108 questions</p>\n                </button>\n            \n                <button ion-item (click)="presentError()">\n                  \n                    Priority\n                  <p>108 questions</p>\n                </button>\n            \n                <button ion-item (click)="presentError()">\n                  \n                    Psychische und soziale Voraussetzungen/Mental and social conditions\n                  <p>108 questions</p>\n                </button>\n            \n              </ion-list>\n            </ion-card>\n\n</ion-content>\n'/*ion-inline-end:"F:\AppVilo\ALL_PROJECT\Juliia projects\Teory\mobile\MentorCard\src\pages\chapters\chapters.html"*/,
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1_ionic_angular__["i" /* NavController */], __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["j" /* NavParams */], __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["a" /* AlertController */]])
    ], ChaptersPage);
    return ChaptersPage;
}());

//# sourceMappingURL=chapters.js.map

/***/ }),

/***/ 167:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return ForgotPage; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_ionic_angular__ = __webpack_require__(12);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__angular_forms__ = __webpack_require__(25);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__login_login__ = __webpack_require__(50);
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};




/**
 * Generated class for the ForgotPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */
var ForgotPage = /** @class */ (function () {
    function ForgotPage(navCtrl, navParams, fb) {
        this.navCtrl = navCtrl;
        this.navParams = navParams;
        this.fb = fb;
        this.forgetData = { email: '' };
        this.authForm = this.fb.group({
            'email': [null, __WEBPACK_IMPORTED_MODULE_2__angular_forms__["f" /* Validators */].compose([__WEBPACK_IMPORTED_MODULE_2__angular_forms__["f" /* Validators */].required])],
        });
        //this.email = this.authForm.controls['email'];
    }
    ForgotPage.prototype.ionViewDidLoad = function () {
        console.log('ionViewDidLoad ForgotPage');
    };
    ForgotPage.prototype.moveToForgot = function () {
        this.navCtrl.setRoot(__WEBPACK_IMPORTED_MODULE_3__login_login__["a" /* LoginPage */]);
    };
    ForgotPage = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["m" /* Component */])({
            selector: 'page-forgot',template:/*ion-inline-start:"F:\AppVilo\ALL_PROJECT\Juliia projects\Teory\mobile\MentorCard\src\pages\forgot\forgot.html"*/'\n<ion-content class="bg-img">\n    <div class="main-content">\n      <div padding text-center style="width: 30%;" class="container-logo" margin-bottom >\n          <img style="width: 25%;"  src="assets/imgs/Logo_Web.png">\n      </div>\n      <div padding text-center class="form-bottom-text">\n        <h3> Reset Password</h3>\n        <label>Enter the email address associated with your account,and review your email.</label>\n      </div>\n      <div text-center class="socialLogin" padding></div>\n        <div padding style="width: 100%;">\n        \n  \n          <ion-list>\n            <ion-item >\n              <ion-label><ion-icon ios="ios-mail" md="md-mail"></ion-icon></ion-label>\n              <ion-input [(ngModel)]="forgetData.email"  id="email" type="email" required placeholder="Email *"></ion-input>\n            </ion-item>\n          </ion-list>\n          <button type="submit" ion-button full color="dark" [disabled]="!authForm.valid">Send</button>\n    \n  \n        <div padding text-center class="form-bottom-text">\n          <label>\n            <a href="javascript:void(0);" (click)="moveToForgot()" style="color: black">Back to Login</a>\n          </label>\n        </div>\n  \n      </div>\n    </div>\n  </ion-content>  '/*ion-inline-end:"F:\AppVilo\ALL_PROJECT\Juliia projects\Teory\mobile\MentorCard\src\pages\forgot\forgot.html"*/,
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1_ionic_angular__["i" /* NavController */], __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["j" /* NavParams */], __WEBPACK_IMPORTED_MODULE_2__angular_forms__["a" /* FormBuilder */]])
    ], ForgotPage);
    return ForgotPage;
}());

//# sourceMappingURL=forgot.js.map

/***/ }),

/***/ 168:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return RegisterPage; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_ionic_angular__ = __webpack_require__(12);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__login_login__ = __webpack_require__(50);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__dashboard_dashboard__ = __webpack_require__(63);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__angular_common_http__ = __webpack_require__(64);
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};





/**
 * Generated class for the RegisterPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */
var RegisterPage = /** @class */ (function () {
    function RegisterPage(navCtrl, navParams, loadingCtrl, alertCtrl, http) {
        this.navCtrl = navCtrl;
        this.navParams = navParams;
        this.loadingCtrl = loadingCtrl;
        this.alertCtrl = alertCtrl;
        this.http = http;
        this.regData = { fn: '', ln: '', email: '', rap_email: '', pass: '', phone: '', num: '', bith: '', street: '',
            postcode: '', city: '', pin: '' };
    }
    RegisterPage.prototype.moveToLogin = function () {
        this.navCtrl.setRoot(__WEBPACK_IMPORTED_MODULE_2__login_login__["a" /* LoginPage */]);
    };
    RegisterPage.prototype.updateCucumber1 = function () {
        console.log('Cucumbers new state:' + this.check_1);
    };
    RegisterPage.prototype.presentLoadingDefault = function () {
        this.loading = this.loadingCtrl.create({
            content: 'Please wait...'
        });
        this.loading.present();
    };
    RegisterPage.prototype.postReg = function () {
        var _this = this;
        if (this.regData.fn.length > 0 && this.regData.ln.length > 0 && this.regData.email.length > 0
            && this.regData.rap_email.length > 0 && this.regData.pass.length > 0 && this.regData.phone.length > 0
            && this.regData.num.length > 0 && this.regData.bith.length > 0 && this.regData.street.length > 0
            && this.regData.postcode.length > 0 && this.regData.city.length > 0 && this.regData.pin.length > 0) {
            if (this.regData.rap_email == this.regData.email) {
                if (this.check_1 == true && this.check_3 == true && this.check_2 == true) {
                    this.presentLoadingDefault();
                    var url = "http://www.mentorcard.de/api/register.php";
                    var postData = new FormData();
                    postData.append('username', this.regData.email);
                    postData.append('password', this.regData.pass);
                    postData.append('first_name', this.regData.fn);
                    postData.append('last_name', this.regData.ln);
                    postData.append('date', this.regData.bith);
                    postData.append('place', this.regData.street);
                    postData.append('country', this.regData.city);
                    postData.append('phone', this.regData.num);
                    postData.append('email', this.regData.email);
                    postData.append('active_code', this.regData.pin);
                    this.data = this.http.post(url, postData);
                    this.data.subscribe(function (data) {
                        if (data['status'] == "200 OK") {
                            _this.loading.dismiss();
                            _this.navCtrl.setRoot(__WEBPACK_IMPORTED_MODULE_3__dashboard_dashboard__["a" /* DashboardPage */]);
                        }
                        else {
                            _this.loading.dismiss();
                            _this.presentError();
                        }
                        console.log(data);
                    });
                    this.loading.dismiss();
                }
                else {
                }
            }
            else {
                this.presentError2();
            }
        }
        else {
            this.presentError();
        }
    };
    RegisterPage.prototype.presentError = function () {
        var alert = this.alertCtrl.create({
            title: 'Error',
            subTitle: 'Field is empty',
            buttons: ['Ok']
        });
        alert.present();
    };
    RegisterPage.prototype.presentError3 = function () {
        var alert = this.alertCtrl.create({
            title: 'Error',
            subTitle: 'Accept agreements',
            buttons: ['Ok']
        });
        alert.present();
    };
    RegisterPage.prototype.presentError2 = function () {
        var alert = this.alertCtrl.create({
            title: 'Error',
            subTitle: 'Email do not match',
            buttons: ['Ok']
        });
        alert.present();
    };
    RegisterPage = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["m" /* Component */])({
            selector: 'page-register',template:/*ion-inline-start:"F:\AppVilo\ALL_PROJECT\Juliia projects\Teory\mobile\MentorCard\src\pages\register\register.html"*/'\n<ion-content class="bg-img">\n    <div class="main-content">\n      <div padding text-center class="container-logo">\n          <img style="width: 25%;" src="assets/imgs/Logo_Web.png">\n      </div>\n  \n      <div padding  style="width: 100%;">\n     \n        <ion-list>\n\n            <ion-item>\n                <ion-label >Title</ion-label>\n                <ion-select [(ngModel)]="gender" placeholder="Title">\n                  <ion-option value="mr">Mr.</ion-option>\n                  <ion-option value="mrs">Mrs.</ion-option>\n                  <ion-option value="miss">Miss.</ion-option>\n                  <ion-option value="ms">Ms.</ion-option>\n                  <ion-option value="other">Other</ion-option>\n                </ion-select>\n              </ion-item>\n\n                     \n      <ion-item>\n          <ion-icon name="ios-person" ></ion-icon>\n          <ion-label   stacked>\n            First Name\n          </ion-label>\n            <ion-input type="text" [(ngModel)]="regData.fn"  placeholder="First Name"></ion-input>\n          \n        </ion-item>\n  \n  \n        <ion-item>\n            <ion-icon name="ios-person" ></ion-icon>\n            <ion-label   stacked>\n              Last Name\n            </ion-label>\n              <ion-input type="text" [(ngModel)]="regData.ln"   placeholder="Last Name"></ion-input>\n            \n          </ion-item>\n        \n        <ion-item>\n          <ion-icon name="mail" ></ion-icon>\n          <ion-label   stacked>\n            Email\n          </ion-label>\n            <ion-input type="text" [(ngModel)]="regData.email"  placeholder="Email"></ion-input>\n          \n        </ion-item>\n  \n        <ion-item>\n            <ion-icon name="mail" ></ion-icon>\n            <ion-label   stacked>\n                Repeat Email\n            </ion-label>\n              <ion-input type="text" [(ngModel)]="regData.rap_email"   placeholder="Repeat Email"></ion-input>\n            \n          </ion-item>\n\n        <ion-item>\n            <ion-icon name="password" ></ion-icon>\n            <ion-label   stacked>\n             Password\n            </ion-label>\n              <ion-input type="password" [(ngModel)]="regData.pass"  placeholder="Password"></ion-input>\n            \n          </ion-item>\n    \n        <ion-item>\n            <ion-icon name="person" ></ion-icon>\n            <ion-label   stacked>\n                Telephone No\n            </ion-label>\n              <ion-input type="text" [(ngModel)]="regData.phone"  placeholder="Phone Number"></ion-input>\n            \n          </ion-item>\n          <ion-item>\n              <ion-icon name="person" ></ion-icon>\n              <ion-label   stacked>\n                  Mobile Number\n              </ion-label>\n                <ion-input type="text" [(ngModel)]="regData.num"  placeholder="Mobile Number"></ion-input>\n              \n            </ion-item>\n          <ion-item>\n              <ion-icon name="person" ></ion-icon>\n              <ion-label   stacked>\n                Birthday\n              </ion-label>\n                <ion-datetime displayFormat="MMM DD YYYY" [(ngModel)]="regData.bith" placeholder="Birthday"></ion-datetime>\n             \n            </ion-item>\n            <ion-item>\n                <ion-icon name="person" ></ion-icon>\n                <ion-label   stacked>\n                    Street\n                </ion-label>\n                  <ion-input type="text"  [(ngModel)]="regData.street" placeholder="Street"></ion-input>\n                \n              </ion-item>\n              <ion-item>\n                  <ion-icon name="person" ></ion-icon>\n                  <ion-label   stacked>\n                      Post Code\n                  </ion-label>\n                    <ion-input type="number"  [(ngModel)]="regData.postcode" placeholder="Post Code"></ion-input>\n                  \n                </ion-item>\n  \n                <ion-item>\n                    <ion-icon name="person" ></ion-icon>\n                    <ion-label   stacked>\n                        City\n                    </ion-label>\n                      <ion-input type="text"  [(ngModel)]="regData.city"  placeholder="City"></ion-input>\n                    \n                  </ion-item>\n  \n                  <ion-item>\n                      <ion-icon name="person" ></ion-icon>\n                      <ion-label   stacked>\n                          Mentorcard Pin\n                      </ion-label>\n                        <ion-input type="text"  [(ngModel)]="regData.pin" placeholder="Mentorcard Pin"></ion-input>\n                      \n                    </ion-item>\n  \n                      <ion-item>\n                          <ion-label >Select your language to take<br> the original test</ion-label>\n                          <ion-select [(ngModel)]="lang_1">\n                            <ion-option value="eng">Arabic</ion-option>\n                            <ion-option value="eng">Croatian</ion-option>\n                            <ion-option value="ger">English</ion-option>\n                            <ion-option value="ger">French</ion-option>\n                            <ion-option value="ger">Germany</ion-option>\n                            <ion-option value="ger">Greek</ion-option>\n                            <ion-option value="ger">Italian</ion-option>\n                            <ion-option value="ger">Polish</ion-option>\n                            <ion-option value="ger">Português</ion-option>\n                            <ion-option value="ger">Русский</ion-option>\n                            <ion-option value="ger">Română</ion-option>\n                            <ion-option value="ger">Spanish</ion-option>\n                            <ion-option value="ger">Turk</ion-option>\n                          </ion-select>\n                        </ion-item>\n  \n                        <ion-item>\n                            <ion-label >Select your language to study</ion-label>\n                            <ion-select [(ngModel)]="lang_2">\n                              <ion-option value="eng">Arabic</ion-option>\n                              <ion-option value="eng">Croatian</ion-option>\n                              <ion-option value="ger">English</ion-option>\n                              <ion-option value="ger">French</ion-option>\n                              <ion-option value="ger">Germany</ion-option>\n                              <ion-option value="ger">Greek</ion-option>\n                              <ion-option value="ger">Italian</ion-option>\n                              <ion-option value="ger">Polish</ion-option>\n                              <ion-option value="ger">Português</ion-option>\n                              <ion-option value="ger">Русский</ion-option>\n                              <ion-option value="ger">Română</ion-option>\n                              <ion-option value="ger">Spanish</ion-option>\n                              <ion-option value="ger">Turk</ion-option>\n                              \n                            </ion-select>\n                          </ion-item>\n\n\n                            \n                            <br>\n\n                              <ion-item>\n                                  <ion-label>I have read the terms and <br>\n                                             conditions and agree \n                                      with them.</ion-label>\n                                  <ion-checkbox color="dark" [(ngModel)]="check_1"  (ionChange)="updateCucumber1()" checked="false"></ion-checkbox>\n                                </ion-item>\n\n                                <ion-item>\n                                    <ion-label>I have read the privacy \n                                      policy <br>and agree with\n                                       them.</ion-label>\n                                    <ion-checkbox color="dark" [(ngModel)]="check_2" checked="false"></ion-checkbox>\n                                  </ion-item>\n\n                                  <ion-item>\n                                      <ion-label>I agree that Sood Germany\n                                         GmbH <br>will also send me\n                                          further offers <br>by post \n                                          and / or email and \n                                          \n                                          or<br> Mobile  or Whatsapp \n                                          and/ or<br> inform me of\n                                          \n                                          any changes.</ion-label>\n                                      <ion-checkbox color="dark" [(ngModel)]="check_3" checked="false"></ion-checkbox>\n                                    </ion-item>\n    \n        </ion-list>\n        <button ion-button full color="dark" (click)="postReg()">Sign up</button>\n     \n      <div class="sepretor-or" padding-horizontal> <p style="color: black">Or</p></div>\n      \n      \n      <div padding text-center class="form-bottom-text">\n        <label style="color: black"> Already have an Account? <a href="javascript:void(0);" style="color: black" (click)="moveToLogin()"> Sign In </a> </label>\n      </div>\n    </div>\n    </div>\n  </ion-content>  '/*ion-inline-end:"F:\AppVilo\ALL_PROJECT\Juliia projects\Teory\mobile\MentorCard\src\pages\register\register.html"*/,
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1_ionic_angular__["i" /* NavController */], __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["j" /* NavParams */], __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["f" /* LoadingController */],
            __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["a" /* AlertController */], __WEBPACK_IMPORTED_MODULE_4__angular_common_http__["a" /* HttpClient */]])
    ], RegisterPage);
    return RegisterPage;
}());

//# sourceMappingURL=register.js.map

/***/ }),

/***/ 169:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return PracticePage; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_ionic_angular__ = __webpack_require__(12);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__end_test_mock_end_test_mock__ = __webpack_require__(101);
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};






/**
 * Generated class for the PracticePage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */
var PracticePage = /** @class */ (function () {
    function PracticePage(navCtrl, navParams, alertCtrl) {
        this.navCtrl = navCtrl;
        this.navParams = navParams;
        this.alertCtrl = alertCtrl;
        this.buttonColor = '#222d32';
        this.buttonColor2 = '#fff';
        this.colorString = '#fff';
        this.colorString2 = '#000';
        this.gig = 1;
    }
    PracticePage.prototype.openFilters2 = function () {
        this.buttonColor = '#222d32';
        this.buttonColor2 = '#fff';
        this.colorString = '#fff';
        this.colorString2 = '#000';
        this.gig = 1;
        this.slides.slideTo(0);
    };
    PracticePage.prototype.openFilters = function () {
        this.buttonColor = '#fff';
        this.buttonColor2 = '#222d32';
        this.colorString = '#000';
        this.colorString2 = '#fff';
        this.gig = 1;
        this.slides.slideTo(0);
    };
    PracticePage.prototype.setNum = function (num) {
        this.slides.slideTo(num - 1);
        this.gig = num;
    };
    PracticePage.prototype.ionViewDidLoad = function () {
        console.log('ionViewDidLoad PracticePage');
    };
    PracticePage.prototype.next = function () {
        if (this.gig < 20) {
            this.gig = this.gig + 1;
            this.slides.slideNext();
        }
    };
    PracticePage.prototype.sdat = function () {
        this.navCtrl.setRoot(__WEBPACK_IMPORTED_MODULE_2__end_test_mock_end_test_mock__["a" /* EndTestMockPage */]);
    };
    PracticePage.prototype.prev = function () {
        if (this.gig > 1) {
            this.gig = this.gig - 1;
            this.slides.slidePrev();
        }
    };
    PracticePage.prototype.showConfirm = function () {
        var _this = this;
        var confirm = this.alertCtrl.create({
            title: 'Confirm',
            message: 'Are you sure you want to submit?',
            buttons: [
                {
                    text: 'No',
                    role: 'cancel',
                    handler: function () {
                        console.log('Disagree clicked');
                    }
                },
                {
                    text: 'Yes',
                    handler: function () {
                        _this.sdat();
                    }
                }
            ]
        });
        confirm.present();
    };
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_8" /* ViewChild */])('slides'),
        __metadata("design:type", __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["l" /* Slides */])
    ], PracticePage.prototype, "slides", void 0);
    PracticePage = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["m" /* Component */])({
            selector: 'page-practice',template:/*ion-inline-start:"F:\AppVilo\ALL_PROJECT\Juliia projects\Teory\mobile\MentorCard\src\pages\practice\practice.html"*/'<!--\n  Generated template for the PracticePage page.\n\n  See http://ionicframework.com/docs/components/#navigation for more info on\n  Ionic pages and navigation.\n-->\n<ion-header>\n\n        <ion-navbar>\n            <button ion-button menuToggle>\n                <ion-icon name="menu"></ion-icon>\n              </button>\n          <ion-title *ngIf="gig==\'1\'">1.1.02.101</ion-title>\n          <ion-title *ngIf="gig==\'2\'">1.1.02.102</ion-title>\n          <ion-title *ngIf="gig==\'3\'">1.1.02.103</ion-title>\n          <ion-title *ngIf="gig==\'4\'">1.1.02.104</ion-title>\n          <ion-title *ngIf="gig==\'5\'">1.1.02.105</ion-title>\n          <ion-title *ngIf="gig==\'6\'">1.1.02.106</ion-title>\n          <ion-title *ngIf="gig==\'7\'">1.1.02.107</ion-title>\n          <ion-title *ngIf="gig==\'8\'">1.1.02.108</ion-title>\n          <ion-title *ngIf="gig==\'9\'">1.1.02.109</ion-title>\n          <ion-title *ngIf="gig==\'10\'">1.1.02.111</ion-title>\n          <ion-title *ngIf="gig==\'11\'">1.1.02.121</ion-title>\n          <ion-title *ngIf="gig==\'12\'">1.1.02.131</ion-title>\n          <ion-title *ngIf="gig==\'13\'">1.1.02.141</ion-title>\n          <ion-title *ngIf="gig==\'14\'">1.1.02.151</ion-title>\n          <ion-title *ngIf="gig==\'15\'">1.1.02.161</ion-title>\n          <ion-title *ngIf="gig==\'16\'">1.1.02.171</ion-title>\n          <ion-title *ngIf="gig==\'17\'">1.1.02.181</ion-title>\n          <ion-title *ngIf="gig==\'18\'">1.1.02.191</ion-title>\n          <ion-title *ngIf="gig==\'19\'">1.1.02.131</ion-title>\n          <ion-title *ngIf="gig==\'20\'">1.1.02.141</ion-title>\n          <ion-buttons end>\n              Points: 4\n            </ion-buttons>\n        </ion-navbar>\n      \n      </ion-header>\n      \n      \n      <ion-content >\n          <ion-list >\n          <ion-slides #slides>\n    \n                <ion-slide >\n                      \n                            <ion-item no-lines>\n                              \n                                <h2 ><b>The cyclist in front of me will?</b></h2>\n                             \n                             \n                            </ion-item >\n                          \n                            \n                            <div id="over" style="margin: 5px; ">\n                                <img     src="assets/imgs/stu_standart.png">\n                            </div>\n                          \n                            <ion-card-content>\n                                <ion-item no-lines>\n                                     <ion-label><b>- turn to the left</b></ion-label>\n                                    <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                  </ion-item>\n                                  <ion-item no-lines>\n                                      <ion-label><b>- go to the other side of the road</b></ion-label>\n                                      <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                    </ion-item>\n                                    <ion-item no-lines>\n                                         <ion-label><b>- not impede me as i proceed</b></ion-label>\n                                        <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                      </ion-item>\n                            </ion-card-content>\n                          \n                            \n                          \n                         \n                    </ion-slide>\n                    <ion-slide >\n                          \n                \n                                <ion-item no-lines>\n                                  \n                                          <h2 ><b>The cyclist in front of me will?</b></h2>\n                                       \n              \n                                </ion-item >\n                              \n                                \n                                <div id="over" style="margin: 5px; ">\n                                    <img     src="assets/imgs/stu_standart.png">\n                                </div>\n                              \n                                <ion-card-content>\n                                    <ion-item no-lines>\n                                         <ion-label><b>- turn to the left</b></ion-label>\n                                        <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                      </ion-item>\n                                      <ion-item no-lines>\n                                          <ion-label><b>- go to the other side of the road</b></ion-label>\n                                          \n                                          <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                        </ion-item>\n                                        <ion-item no-lines>\n                                             <ion-label><b>- not impede me as i proceed</b></ion-label>\n                                           \n                                            <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                          </ion-item>\n                                </ion-card-content>\n                              \n                                \n                              \n                            \n                        </ion-slide>\n                        <ion-slide >\n                              \n                    \n                                    <ion-item no-lines>\n                                      \n                                              <h2 ><b>The cyclist in front of me will?</b></h2>\n                                           \n                  \n                                    </ion-item >\n                                  \n                                    \n                                    <div id="over" style="margin: 5px; ">\n                                        <img     src="assets/imgs/stu_standart.png">\n                                    </div>\n                                  \n                                    <ion-card-content>\n                                        <ion-item no-lines>\n                                             <ion-label><b>- turn to the left</b></ion-label>\n                                            <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                          </ion-item>\n                                          <ion-item no-lines>\n                                              <ion-label><b>- go to the other side of the road</b></ion-label>\n                                              <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                            </ion-item>\n                                            <ion-item no-lines>\n                                                 <ion-label><b>- not impede me as i proceed</b></ion-label>\n                                                <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                              </ion-item>\n                                    </ion-card-content>\n                                  \n                                    \n                                  \n                                \n                            </ion-slide>\n                            <ion-slide >\n                                  \n                        \n                                        <ion-item no-lines>\n                                          \n                                                  <h2 ><b>The cyclist in front of me will?</b></h2>\n                                               \n                      \n                                        </ion-item >\n                                      \n                                        \n                                        <div id="over" style="margin: 5px; ">\n                                            <img     src="assets/imgs/stu_standart.png">\n                                        </div>\n                                      \n                                        <ion-card-content>\n                                            <ion-item no-lines>\n                                                 <ion-label><b>- turn to the left</b></ion-label>\n                                                <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                              </ion-item>\n                                              <ion-item no-lines>\n                                                  <ion-label><b>- go to the other side of the road</b></ion-label>\n                                                  <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                </ion-item>\n                                                <ion-item no-lines>\n                                                     <ion-label><b>- not impede me as i proceed</b></ion-label>\n                                                    <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                  </ion-item>\n                                        </ion-card-content>\n                                      \n                                        \n                                      \n                                    \n                                </ion-slide>\n                                <ion-slide >\n                                      \n                            \n                                            <ion-item no-lines>\n                                              \n                                                      <h2 ><b>The cyclist in front of me will?</b></h2>\n                                                   \n                          \n                                            </ion-item >\n                                          \n                                            \n                                            <div id="over" style="margin: 5px; ">\n                                                <img     src="assets/imgs/stu_standart.png">\n                                            </div>\n                                          \n                                            <ion-card-content>\n                                                <ion-item no-lines>\n                                                     <ion-label><b>- turn to the left</b></ion-label>\n                                                    <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                  </ion-item>\n                                                  <ion-item no-lines>\n                                                      <ion-label><b>- go to the other side of the road</b></ion-label>\n                                                      <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                    </ion-item>\n                                                    <ion-item no-lines>\n                                                         <ion-label><b>- not impede me as i proceed</b></ion-label>\n                                                        <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                      </ion-item>\n                                            </ion-card-content>\n                                          \n                                            \n                                          \n                                        \n                                    </ion-slide>\n                                    <ion-slide >\n                                          \n                                \n                                                <ion-item no-lines>\n                                                  \n                                                          <h2 ><b>The cyclist in front of me will?</b></h2>\n                                                       \n                              \n                                                </ion-item >\n                                              \n                                                \n                                                <div id="over" style="margin: 5px; ">\n                                                    <img     src="assets/imgs/stu_standart.png">\n                                                </div>\n                                              \n                                                <ion-card-content>\n                                                    <ion-item no-lines>\n                                                         <ion-label><b>- turn to the left</b></ion-label>\n                                                        <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                      </ion-item>\n                                                      <ion-item no-lines>\n                                                          <ion-label><b>- go to the other side of the road</b></ion-label>\n                                                          <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                        </ion-item>\n                                                        <ion-item no-lines>\n                                                             <ion-label><b>- not impede me as i proceed</b></ion-label>\n                                                            <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                          </ion-item>\n                                                </ion-card-content>\n                                              \n                                                \n                                              \n                                            \n                                        </ion-slide>\n                                        <ion-slide >\n                                              \n                                    \n                                                    <ion-item no-lines>\n                                                      \n                                                              <h2 ><b>The cyclist in front of me will?</b></h2>\n                                                           \n                                  \n                                                    </ion-item >\n                                                  \n                                                    \n                                                    <div id="over" style="margin: 5px; ">\n                                                        <img     src="assets/imgs/stu_standart.png">\n                                                    </div>\n                                                  \n                                                    <ion-card-content>\n                                                        <ion-item no-lines>\n                                                             <ion-label><b>- turn to the left</b></ion-label>\n                                                            <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                          </ion-item>\n                                                          <ion-item no-lines>\n                                                              <ion-label><b>- go to the other side of the road</b></ion-label>\n                                                              <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                            </ion-item>\n                                                            <ion-item no-lines>\n                                                                 <ion-label><b>- not impede me as i proceed</b></ion-label>\n                                                                <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                              </ion-item>\n                                                    </ion-card-content>\n                                                  \n                                                    \n                                                  \n                                                \n                                            </ion-slide>\n                                            <ion-slide >\n                                                  \n                                        \n                                                        <ion-item no-lines>\n                                                          \n                                                                  <h2 ><b>The cyclist in front of me will?</b></h2>\n                                                               \n                                      \n                                                        </ion-item >\n                                                      \n                                                        \n                                                        <div id="over" style="margin: 5px; ">\n                                                            <img     src="assets/imgs/stu_standart.png">\n                                                        </div>\n                                                      \n                                                        <ion-card-content>\n                                                            <ion-item no-lines>\n                                                                 <ion-label><b>- turn to the left</b></ion-label>\n                                                                <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                              </ion-item>\n                                                              <ion-item no-lines>\n                                                                  <ion-label><b>- go to the other side of the road</b></ion-label>\n                                                                  <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                </ion-item>\n                                                                <ion-item no-lines>\n                                                                     <ion-label><b>- not impede me as i proceed</b></ion-label>\n                                                                    <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                  </ion-item>\n                                                        </ion-card-content>\n                                                      \n                                                        \n                                                      \n                                                    \n                                                </ion-slide>\n                                                <ion-slide >\n                                                      \n                                            \n                                                            <ion-item no-lines>\n                                                              \n                                                                      <h2 ><b>The cyclist in front of me will?</b></h2>\n                                                                   \n                                          \n                                                            </ion-item >\n                                                          \n                                                            \n                                                            <div id="over" style="margin: 5px; ">\n                                                                <img     src="assets/imgs/stu_standart.png">\n                                                            </div>\n                                                          \n                                                            <ion-card-content>\n                                                                <ion-item no-lines>\n                                                                     <ion-label><b>- turn to the left</b></ion-label>\n                                                                    <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                  </ion-item>\n                                                                  <ion-item no-lines>\n                                                                      <ion-label><b>- go to the other side of the road</b></ion-label>\n                                                                      <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                    </ion-item>\n                                                                    <ion-item no-lines>\n                                                                         <ion-label><b>- not impede me as i proceed</b></ion-label>\n                                                                        <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                      </ion-item>\n                                                            </ion-card-content>\n                                                          \n                                                            \n                                                          \n                                                        \n                                                    </ion-slide>\n                                                    <ion-slide >\n                                                          \n                                                \n                                                                <ion-item no-lines>\n                                                                  \n                                                                          <h2 ><b>The cyclist in front of me will?</b></h2>\n                                                                       \n                                              \n                                                                </ion-item >\n                                                              \n                                                                \n                                                                <div id="over" style="margin: 5px; ">\n                                                                    <img     src="assets/imgs/stu_standart.png">\n                                                                </div>\n                                                              \n                                                                <ion-card-content>\n                                                                    <ion-item no-lines>\n                                                                         <ion-label><b>- turn to the left</b></ion-label>\n                                                                        <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                      </ion-item>\n                                                                      <ion-item no-lines>\n                                                                          <ion-label><b>- go to the other side of the road</b></ion-label>\n                                                                          <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                        </ion-item>\n                                                                        <ion-item no-lines>\n                                                                             <ion-label><b>- not impede me as i proceed</b></ion-label>\n                                                                            <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                          </ion-item>\n                                                                </ion-card-content>\n                                                              \n                                                                \n                                                              \n                                                            \n                                                        </ion-slide>\n                                                        <ion-slide >\n                                                              \n                                                    \n                                                                    <ion-item no-lines>\n                                                                      \n                                                                              <h2 ><b>The cyclist in front of me will?</b></h2>\n                                                                           \n                                                                    </ion-item >\n                                                                  \n                                                                    \n                                                                    <div id="over" style="margin: 5px; ">\n                                                                        <img     src="assets/imgs/stu_standart.png">\n                                                                    </div>\n                                                                  \n                                                                    <ion-card-content>\n                                                                        <ion-item no-lines>\n                                                                             <ion-label><b>- turn to the left</b></ion-label>\n                                                                            <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                          </ion-item>\n                                                                          <ion-item no-lines>\n                                                                              <ion-label><b>- go to the other side of the road</b></ion-label>\n                                                                              <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                            </ion-item>\n                                                                            <ion-item no-lines>\n                                                                                 <ion-label><b>- not impede me as i proceed</b></ion-label>\n                                                                                <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                              </ion-item>\n                                                                    </ion-card-content>\n                                                                  \n                                                                    \n                                                                  \n                                                                \n                                                            </ion-slide>\n                                                            <ion-slide >\n                                                                  \n                                                        \n                                                                        <ion-item no-lines>\n                                                                          \n                                                                                  <h2 ><b>The cyclist in front of me will?</b></h2>\n                                                                               \n                                                      \n                                                                        </ion-item >\n                                                                      \n                                                                        \n                                                                        <div id="over" style="margin: 5px; ">\n                                                                            <img     src="assets/imgs/stu_standart.png">\n                                                                        </div>\n                                                                      \n                                                                        <ion-card-content>\n                                                                            <ion-item no-lines>\n                                                                                 <ion-label><b>- turn to the left</b></ion-label>\n                                                                                <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                              </ion-item>\n                                                                              <ion-item no-lines>\n                                                                                  <ion-label><b>- go to the other side of the road</b></ion-label>\n                                                                                  <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                                </ion-item>\n                                                                                <ion-item no-lines>\n                                                                                     <ion-label><b>- not impede me as i proceed</b></ion-label>\n                                                                                    <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                                  </ion-item>\n                                                                        </ion-card-content>\n                                                                      \n                                                                        \n                                                                      \n                                                                    \n                                                                </ion-slide>\n                                                                <ion-slide >\n                                                                      \n                                                            \n                                                                            <ion-item no-lines>\n                                                                              \n                                                                                      <h2 ><b>The cyclist in front of me will?</b></h2>\n                                                                                   \n                                                          \n                                                                            </ion-item >\n                                                                          \n                                                                            \n                                                                            <div id="over" style="margin: 5px; ">\n                                                                                <img     src="assets/imgs/stu_standart.png">\n                                                                            </div>\n                                                                          \n                                                                            <ion-card-content>\n                                                                                <ion-item no-lines>\n                                                                                     <ion-label><b>- turn to the left</b></ion-label>\n                                                                                    <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                                  </ion-item>\n                                                                                  <ion-item no-lines>\n                                                                                      <ion-label><b>- go to the other side of the road</b></ion-label>\n                                                                                      <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                                    </ion-item>\n                                                                                    <ion-item no-lines>\n                                                                                         <ion-label><b>- not impede me as i proceed</b></ion-label>\n                                                                                        <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                                      </ion-item>\n                                                                            </ion-card-content>\n                                                                          \n                                                                            \n                                                                          \n                                                                        \n                                                                    </ion-slide>\n                                                                    <ion-slide >\n                                                                          \n                                                                \n                                                                                <ion-item no-lines>\n                                                                                  \n                                                                                          <h2 ><b>The cyclist in front of me will?</b></h2>\n                                                                                       \n                                                              \n                                                                                </ion-item >\n                                                                              \n                                                                                \n                                                                                <div id="over" style="margin: 5px; ">\n                                                                                    <img     src="assets/imgs/stu_standart.png">\n                                                                                </div>\n                                                                              \n                                                                                <ion-card-content>\n                                                                                    <ion-item no-lines>\n                                                                                         <ion-label><b>- turn to the left</b></ion-label>\n                                                                                        <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                                      </ion-item>\n                                                                                      <ion-item no-lines>\n                                                                                          <ion-label><b>- go to the other side of the road</b></ion-label>\n                                                                                          <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                                        </ion-item>\n                                                                                        <ion-item no-lines>\n                                                                                             <ion-label><b>- not impede me as i proceed</b></ion-label>\n                                                                                            <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                                          </ion-item>\n                                                                                </ion-card-content>\n                                                                              \n                                                                                \n                                                                              \n                                                                            \n                                                                        </ion-slide>\n                                                                        <ion-slide >\n                                                                              \n                                                                    \n                                                                                    <ion-item no-lines>\n                                                                                      \n                                                                                              <h2 ><b>The cyclist in front of me will?</b></h2>\n                                                                                           \n                                                                  \n                                                                                    </ion-item >\n                                                                                  \n                                                                                    \n                                                                                    <div id="over" style="margin: 5px; ">\n                                                                                        <img     src="assets/imgs/stu_standart.png">\n                                                                                    </div>\n                                                                                  \n                                                                                    <ion-card-content>\n                                                                                        <ion-item no-lines>\n                                                                                             <ion-label><b>- turn to the left</b></ion-label>\n                                                                                            <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                                          </ion-item>\n                                                                                          <ion-item no-lines>\n                                                                                              <ion-label><b>- go to the other side of the road</b></ion-label>\n                                                                                              <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                                            </ion-item>\n                                                                                            <ion-item no-lines>\n                                                                                                 <ion-label><b>- not impede me as i proceed</b></ion-label>\n                                                                                                <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                                              </ion-item>\n                                                                                    </ion-card-content>\n                                                                                  \n                                                                                    \n                                                                                  \n                                                                                \n                                                                            </ion-slide>\n                                                                            <ion-slide >\n                                                                                  \n                                                                        \n                                                                                        <ion-item no-lines>\n                                                                                          \n                                                                                                  <h2 ><b>The cyclist in front of me will?</b></h2>\n                                                                                               \n                                                                      \n                                                                                        </ion-item >\n                                                                                      \n                                                                                        \n                                                                                        <div id="over" style="margin: 5px; ">\n                                                                                            <img     src="assets/imgs/stu_standart.png">\n                                                                                        </div>\n                                                                                      \n                                                                                        <ion-card-content>\n                                                                                            <ion-item no-lines>\n                                                                                                 <ion-label><b>- turn to the left</b></ion-label>\n                                                                                                <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                                              </ion-item>\n                                                                                              <ion-item no-lines>\n                                                                                                  <ion-label><b>- go to the other side of the road</b></ion-label>\n                                                                                                  <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                                                </ion-item>\n                                                                                                <ion-item no-lines>\n                                                                                                     <ion-label><b>- not impede me as i proceed</b></ion-label>\n                                                                                                    <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                                                  </ion-item>\n                                                                                        </ion-card-content>\n                                                                                      \n                                                                                        \n                                                                                      \n                                                                                    \n                                                                                </ion-slide>\n                                                                                <ion-slide >\n                                                                                      \n                                                                            \n                                                                                            <ion-item no-lines>\n                                                                                              \n                                                                                                      <h2 ><b>The cyclist in front of me will?</b></h2>\n                                                                                                   \n                                                                          \n                                                                                            </ion-item >\n                                                                                          \n                                                                                            \n                                                                                            <div id="over" style="margin: 5px; ">\n                                                                                                <img     src="assets/imgs/stu_standart.png">\n                                                                                            </div>\n                                                                                          \n                                                                                            <ion-card-content>\n                                                                                                <ion-item no-lines>\n                                                                                                     <ion-label><b>- turn to the left</b></ion-label>\n                                                                                                    <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                                                  </ion-item>\n                                                                                                  <ion-item no-lines>\n                                                                                                      <ion-label><b>- go to the other side of the road</b></ion-label>\n                                                                                                      <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                                                    </ion-item>\n                                                                                                    <ion-item no-lines>\n                                                                                                         <ion-label><b>- not impede me as i proceed</b></ion-label>\n                                                                                                        <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                                                      </ion-item>\n                                                                                            </ion-card-content>\n                                                                                          \n                                                                                            \n                                                                                          \n                                                                                        \n                                                                                    </ion-slide>\n    \n      \n              <ion-slide >\n                \n      \n                      <ion-item no-lines>\n                        \n                              <h2 ><b>The cyclist in front of me will?</b></h2>\n                           \n    \n                      </ion-item >\n                    \n                      \n                      <div id="over" style="margin: 5px; ">\n                          <img     src="assets/imgs/stu_standart.png">\n                      </div>\n                    \n                      <ion-card-content>\n                          <ion-item no-lines>\n                               <ion-label><b>- turn to the left</b></ion-label>\n                              <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                            </ion-item>\n                            <ion-item no-lines>\n                                <ion-label><b>- go to the other side of the road</b></ion-label>\n                                <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                              </ion-item>\n                              <ion-item no-lines>\n                                   <ion-label><b>- not impede me as i proceed</b></ion-label>\n                                  <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                </ion-item>\n                      </ion-card-content>\n                    \n                      \n                    \n                  \n              </ion-slide>\n            \n              <ion-slide >\n                \n      \n                      <ion-item no-lines>\n                        \n                              <h2 ><b>The cyclist in front of me will?</b></h2>\n                           \n        \n                      </ion-item>\n                    \n                      <div id="over" style="margin: 5px; ">\n                          <img     src="assets/imgs/stu_standart.png">\n                      </div>\n                      <ion-card-content>\n                          <ion-item no-lines>\n                               <ion-label><b>- turn to the left</b></ion-label>\n                              <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                            </ion-item>\n                            <ion-item no-lines>\n                                <ion-label><b>- go to the other side of the road</b></ion-label>\n                                <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                              </ion-item>\n                              <ion-item no-lines>\n                                   <ion-label><b>- not impede me as i proceed</b></ion-label>\n                                  <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                </ion-item>\n                      </ion-card-content>\n                    \n                      \n                    \n                  \n              </ion-slide>\n            \n              <ion-slide >\n                \n      \n                      <ion-item no-lines>\n                        \n                              <h2 ><b>The cyclist in front of me will?</b></h2>\n                           \n        \n                      </ion-item>\n                    \n                      <div id="over" style="margin: 5px; ">\n                          <img  src="assets/imgs/stu_standart.png">\n                      </div>\n                    \n                      <ion-card-content>\n                          <ion-item no-lines>\n                               <ion-label><b>- turn to the left</b></ion-label>\n                              <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                            </ion-item>\n                            <ion-item no-lines>\n                                <ion-label><b>- go to the other side of the road</b></ion-label>\n                                <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                              </ion-item>\n                              <ion-item no-lines>\n                                   <ion-label><b>- not impede me as i proceed</b></ion-label>\n                                  <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                </ion-item>\n                      </ion-card-content>\n                    \n                      \n                    \n                  \n              </ion-slide>\n            \n            </ion-slides>\n      \n      \n            <ion-footer align-title="center">\n                <ion-grid style="margin-bottom: 15px;">\n                    <ion-row>\n                      \n                          <ion-col >\n                          \n                          </ion-col>\n                     \n                      <ion-col  >\n                        \n                          \n                          <ion-grid >\n                            <ion-row>\n                              <ion-col>\n                                <div>\n                                  \n\n                                      <button ion-button small (click)=" showConfirm()" color="danger"> \n                                    \n                                         \n                                            <ion-icon slot="icon-only" name="log-out"></ion-icon>\n                                        </button>\n\n                                </div>\n                              </ion-col>\n                              <ion-col>\n                                <div>\n                                        <button ion-button small (click)=" prev()" style="background-color: #FFA500;width: 53px;" > \n                                    \n                                         \n                                                \n                                                <ion-icon slot="icon-only" name="arrow-back"></ion-icon>\n                                                \n                                              </button>\n                                </div>\n                              </ion-col>\n                              <ion-col>\n                                <div>\n                                        <button ion-button small  (click)=" next()" style="background-color: #008000;width: 53px;"> \n                                    \n                                         \n                                                \n                                                <ion-icon slot="icon-only" name="arrow-forward"></ion-icon>\n                                              </button>\n                                </div>\n                              </ion-col>\n                            </ion-row>\n                          </ion-grid>\n                          \n\n                      </ion-col>\n      \n                     \n    \n    \n    \n                    </ion-row>\n                    \n                  </ion-grid>\n      \n                <ion-grid text-center >\n                    <ion-row >\n                            <ion-row>\n                                    <ion-col size="3">\n                                      <div>\n                                            <button class="button_basic" (click)=\'openFilters2()\' [ngStyle]="{\'background-color\': buttonColor, \'color\': colorString}" style="margin: 0px;width: 60px;    width: 150px;">Basic Material</button>\n                                                  \n                                      </div>\n                                    </ion-col>\n                                    <ion-col size="3" offset="3">\n                                      <div>\n                                            <button class="button_basic" (click)=\'openFilters()\' [ngStyle]="{\'background-color\': buttonColor2, \'color\': colorString2}"  style="margin: 0px;width: 40px;">B</button>\n                                      </div>\n                                    </ion-col>\n                                  </ion-row>\n                      </ion-row>\n\n\n                      <ion-row style="background-color: #222d32">\n                        <ion-col  style="    margin-top: 5px;">\n                          <div>\n                            <ion-row>\n                                <ion-col size="3">\n                                  <div>\n                                        <button *ngIf="gig == \'1\'" style="background-color: ghostwhite;\n                                        width: 33px;\n                                        padding: 5px;\n                                        margin-bottom: 5px;\n                                        border: 3px solid black;" > \n                                    \n                                         \n                                                \n                                                1\n                                                \n                                              </button>\n\n                                              <button *ngIf="gig != \'1\'"  (click)="setNum(1)" style="background-color: ghostwhite;\n                                        width: 33px;\n                                        padding: 5px;\n                                        margin-bottom: 5px;\n                                        border: 2px solid ghostwhite;" > \n                                    \n                                         \n                                                \n                                                1\n                                                \n                                              </button>\n                                  </div>\n                                </ion-col>\n                                <ion-col size="3" offset="3">\n                                  <div>\n\n                                        <button *ngIf="gig == \'2\'" style="background-color: ghostwhite;\n                                        width: 33px;\n                                        padding: 5px;\n                                        margin-bottom: 5px;\n                                        border: 3px solid black;" > \n                                    \n                                         \n                                                \n                                                2\n                                                \n                                              </button>\n\n                                        <button *ngIf="gig != \'2\'" (click)="setNum(2)" style="background-color: ghostwhite;\n                                        width: 33px;\n                                        padding: 5px;\n                                        margin-bottom: 5px;\n                                        border: 2px solid ghostwhite;\n                                        " > \n                                    \n                                         \n                                                \n                                                2\n                                                \n                                              </button>\n                                  </div>\n                                </ion-col>\n                              </ion-row>\n                          </div>\n                        </ion-col>\n                        <ion-col style="    margin-top: 5px;">\n                          <div>\n                            <ion-row>\n                                <ion-col size="3">\n                                  <div>\n\n                                    \n                                        <button *ngIf="gig == \'3\'" style="background-color: ghostwhite;\n                                        width: 33px;\n                                        padding: 5px;\n                                        margin-bottom: 5px;\n                                        border: 3px solid black;" > \n                                    \n                                         \n                                                \n                                                3\n                                                \n                                              </button>\n\n                                        <button *ngIf="gig != \'3\'"  (click)="setNum(3)" style="background-color: ghostwhite;\n                                        width: 33px;\n                                        padding: 5px;\n                                        margin-bottom: 5px;\n                                        border: 2px solid ghostwhite;\n                                        " > \n                                    \n                                         \n                                                \n                                                3\n                                                \n                                              </button>\n                                  </div>\n                                </ion-col>\n                                <ion-col size="3" offset="3">\n                                  <div>\n\n                                        <button *ngIf="gig == \'4\'"  style="background-color: ghostwhite;\n                                        width: 33px;\n                                        padding: 5px;\n                                        margin-bottom: 5px;\n                                        border: 3px solid black;" > \n                                    \n                                         \n                                                \n                                                4\n                                                \n                                              </button>\n\n                                        <button *ngIf="gig != \'4\'"  (click)="setNum(4)" style="background-color: ghostwhite;\n                                        width: 33px;\n                                        padding: 5px;\n                                        margin-bottom: 5px;\n                                        border: 2px solid ghostwhite;\n                                        " > \n                                    \n                                         \n                                                \n                                                4\n                                                \n                                              </button>\n                                  </div>\n                                </ion-col>\n                              </ion-row>\n                          </div>\n                        </ion-col>\n                        <ion-col size="auto" style="    margin-top: 5px;">\n                          <div>\n                            <ion-row>\n                                <ion-col size="3">\n                                  <div>\n\n                                        <button *ngIf="gig == \'5\'" style="background-color: ghostwhite;\n                                        width: 33px;\n                                        padding: 5px;\n                                        margin-bottom: 5px;\n                                        border: 3px solid black;" > \n                                    \n                                         \n                                                \n                                                5\n                                                \n                                              </button>\n\n                                        <button  *ngIf="gig != \'5\'" (click)="setNum(5)" style="background-color: ghostwhite;\n                                        width: 33px;\n                                        padding: 5px;\n                                        margin-bottom: 5px;\n                                        border: 2px solid ghostwhite;\n                                        " > \n                                    \n                                         \n                                                \n                                                5\n                                                \n                                              </button>\n                                  </div>\n                                </ion-col>\n                                <ion-col size="3" offset="3">\n                                  <div>\n\n                                        <button *ngIf="gig == \'6\'" style="background-color: ghostwhite;\n                                        width: 33px;\n                                        padding: 5px;\n                                        margin-bottom: 5px;\n                                        border: 3px solid black;" > \n                                    \n                                         \n                                                \n                                                6\n                                                \n                                              </button>\n\n                                        <button *ngIf="gig != \'6\'"  (click)="setNum(6)" style="background-color: ghostwhite;\n                                        width: 33px;\n                                        padding: 5px;\n                                        margin-bottom: 5px;\n                                        border: 2px solid ghostwhite;\n                                        " > \n                                    \n                                         \n                                                \n                                                6\n                                                \n                                              </button>\n                                  </div>\n                                </ion-col>\n                              </ion-row>\n                          </div>\n                        </ion-col>\n                        <ion-col style="    margin-top: 5px;">\n                          <div>\n                            <ion-row>\n                                <ion-col size="3">\n                                  <div>\n\n                                        <button *ngIf="gig == \'7\'" style="background-color: ghostwhite;\n                                        width: 33px;\n                                        padding: 5px;\n                                        margin-bottom: 5px;\n                                        border: 3px solid black;" > \n                                    \n                                         \n                                                \n                                                7\n                                                \n                                              </button>\n\n                                        <button  *ngIf="gig != \'7\'" (click)="setNum(7)" style="background-color: ghostwhite;\n                                        width: 33px;\n                                        padding: 5px;\n                                        margin-bottom: 5px;\n                                        border: 2px solid ghostwhite;\n                                        " > \n                                         \n                                                \n                                                7\n                                                \n                                              </button>\n                                  </div>\n                                </ion-col>\n                                <ion-col size="3" offset="3">\n                                  <div>\n\n                                        <button *ngIf="gig == \'8\'" style="background-color: ghostwhite;\n                                        width: 33px;\n                                        padding: 5px;\n                                        margin-bottom: 5px;\n                                        border: 3px solid black;" > \n                                    \n                                         \n                                                \n                                                8\n                                                \n                                              </button>\n\n                                        <button  *ngIf="gig != \'8\'" (click)="setNum(8)" style="background-color: ghostwhite;\n                                        width: 33px;\n                                        padding: 5px;\n                                        margin-bottom: 5px;\n                                        border: 2px solid ghostwhite;\n                                        " > \n                                    \n                                         \n                                                \n                                                8\n                                                \n                                              </button>\n                                  </div>\n                                </ion-col>\n                              </ion-row>\n                          </div>\n                        </ion-col>\n                      </ion-row> <!--tyt-->\n\n                      <ion-row style="background-color: #222d32">\n                            <ion-col  style="    margin-top: 5px;">\n                              <div>\n                                <ion-row>\n                                    <ion-col size="3">\n                                      <div>\n\n                                            <button *ngIf="gig == \'9\'" style="background-color: ghostwhite;\n                                            width: 33px;\n                                            padding: 5px;\n                                            margin-bottom: 5px;\n                                            border: 3px solid black;" > \n                                        \n                                             \n                                                    \n                                                    9\n                                                    \n                                                  </button>\n\n                                            <button  *ngIf="gig != \'9\'" (click)="setNum(9)" style="background-color: ghostwhite;\n                                            width: 33px;\n                                            padding: 5px;\n                                            margin-bottom: 5px;\n                                            border: 2px solid ghostwhite;" > \n                                        \n                                             \n                                                    \n                                                    9\n                                                    \n                                                  </button>\n                                      </div>\n                                    </ion-col>\n                                    <ion-col size="3" offset="3">\n                                      <div>\n\n                                            <button *ngIf="gig == \'10\'" style="background-color: ghostwhite;\n                                            width: 33px;\n                                            padding: 5px;\n                                            margin-bottom: 5px;\n                                            border: 3px solid black;" > \n                                        \n                                             \n                                                    \n                                                    10\n                                                    \n                                                  </button>\n\n                                            <button *ngIf="gig != \'10\'"  (click)="setNum(10)" style="background-color: ghostwhite;\n                                            width: 33px;\n                                            padding: 5px;\n                                            margin-bottom: 5px;\n                                            border: 2px solid ghostwhite;\n                                            " > \n                                        \n                                             \n                                                    \n                                                    10\n                                                    \n                                                  </button>\n                                      </div>\n                                    </ion-col>\n                                  </ion-row>\n                              </div>\n                            </ion-col>\n                            <ion-col style="    margin-top: 5px;">\n                              <div>\n                                <ion-row>\n                                    <ion-col size="3">\n                                      <div>\n\n                                            <button *ngIf="gig == \'11\'" style="background-color: ghostwhite;\n                                            width: 33px;\n                                            padding: 5px;\n                                            margin-bottom: 5px;\n                                            border: 3px solid black;" > \n                                        \n                                             \n                                                    \n                                                    11\n                                                    \n                                                  </button>\n\n\n                                            <button  *ngIf="gig != \'11\'" (click)="setNum(11)" style="background-color: ghostwhite;\n                                            width: 33px;\n                                            padding: 5px;\n                                            margin-bottom: 5px;\n                                            border: 2px solid ghostwhite;\n                                            " > \n                                        \n                                             \n                                                    \n                                                    11\n                                                    \n                                                  </button>\n                                      </div>\n                                    </ion-col>\n                                    <ion-col size="3" offset="3">\n                                      <div>\n\n                                            <button *ngIf="gig == \'12\'" style="background-color: ghostwhite;\n                                            width: 33px;\n                                            padding: 5px;\n                                            margin-bottom: 5px;\n                                            border: 3px solid black;" > \n                                        \n                                             \n                                                    \n                                                    12\n                                                    \n                                                  </button>\n\n\n                                            <button *ngIf="gig != \'12\'" (click)="setNum(12)" style="background-color: ghostwhite;\n                                            width: 33px;\n                                            padding: 5px;\n                                            margin-bottom: 5px;\n                                            border: 2px solid ghostwhite;\n                                            " > \n                                        \n                                             \n                                                    \n                                                    12\n                                                    \n                                                  </button>\n                                      </div>\n                                    </ion-col>\n                                  </ion-row>\n                              </div>\n                            </ion-col>\n                            <ion-col size="auto" style="    margin-top: 5px;">\n                              <div>\n                                <ion-row>\n                                    <ion-col size="3">\n                                      <div>\n\n                                            <button *ngIf="gig == \'13\'" style="background-color: ghostwhite;\n                                            width: 33px;\n                                            padding: 5px;\n                                            margin-bottom: 5px;\n                                            border: 3px solid black;" > \n                                        \n                                             \n                                                    \n                                                    13\n                                                    \n                                                  </button>\n\n                                            <button  *ngIf="gig != \'13\'" (click)="setNum(13)" style="background-color: ghostwhite;\n                                            width: 33px;\n                                            padding: 5px;\n                                            margin-bottom: 5px;\n                                            border: 2px solid ghostwhite;\n                                            " > \n                                        \n                                             \n                                                    \n                                                    13\n                                                    \n                                                  </button>\n                                      </div>\n                                    </ion-col>\n                                    <ion-col size="3" offset="3">\n                                      <div>\n\n                                            <button *ngIf="gig == \'14\'" style="background-color: ghostwhite;\n                                            width: 33px;\n                                            padding: 5px;\n                                            margin-bottom: 5px;\n                                            border: 3px solid black;" > \n                                        \n                                             \n                                                    \n                                                    14\n                                                    \n                                                  </button>\n\n                                            <button  *ngIf="gig != \'14\'" (click)="setNum(14)" style="background-color: ghostwhite;\n                                            width: 33px;\n                                            padding: 5px;\n                                            margin-bottom: 5px;\n                                            border: 2px solid ghostwhite;\n                                            " > \n                                        \n                                             \n                                                    \n                                                   14\n                                                    \n                                                  </button>\n                                      </div>\n                                    </ion-col>\n                                  </ion-row>\n                              </div>\n                            </ion-col>\n                            <ion-col style="    margin-top: 5px;">\n                              <div>\n                                <ion-row>\n                                    <ion-col size="3">\n                                      <div>\n\n                                            <button *ngIf="gig == \'15\'" style="background-color: ghostwhite;\n                                            width: 33px;\n                                            padding: 5px;\n                                            margin-bottom: 5px;\n                                            border: 3px solid black;" > \n                                        \n                                             \n                                                    \n                                                    15\n                                                    \n                                                  </button>\n\n                                            <button  *ngIf="gig != \'15\'" (click)="setNum(15)" style="background-color: ghostwhite;\n                                            width: 33px;\n                                            padding: 5px;\n                                            margin-bottom: 5px;\n                                            border: 2px solid ghostwhite;\n                                            " > \n                                             \n                                                    \n                                                    15\n                                                    \n                                                  </button>\n                                      </div>\n                                    </ion-col>\n                                    <ion-col size="3" offset="3">\n                                      <div>\n\n                                            <button *ngIf="gig == \'16\'" style="background-color: ghostwhite;\n                                            width: 33px;\n                                            padding: 5px;\n                                            margin-bottom: 5px;\n                                            border: 3px solid black;" > \n                                        \n                                             \n                                                    \n                                                    16\n                                                    \n                                                  </button>\n\n                                            <button  *ngIf="gig != \'16\'" (click)="setNum(16)" style="background-color: ghostwhite;\n                                            width: 33px;\n                                            padding: 5px;\n                                            margin-bottom: 5px;\n                                            border: 2px solid ghostwhite;\n                                            " > \n                                        \n                                             \n                                                    \n                                                    16\n                                                    \n                                                  </button>\n                                      </div>\n                                    </ion-col>\n                                  </ion-row>\n                              </div>\n                            </ion-col>\n                          </ion-row> <!--tyt-->\n\n\n                          \n                      <ion-row style="background-color: #222d32">\n                            <ion-col  style="    margin-top: 5px;">\n                              <div>\n                                <ion-row>\n                                    <ion-col size="3">\n                                      <div>\n\n                                            <button *ngIf="gig == \'17\'"  style="background-color: ghostwhite;\n                                            width: 33px;\n                                            padding: 5px;\n                                            margin-bottom: 5px;\n                                            border: 3px solid black;" > \n                                        \n                                             \n                                                    \n                                                    17\n                                                    \n                                                  </button>\n\n\n                                            <button *ngIf="gig != \'17\'" (click)="setNum(17)" style="background-color: ghostwhite;\n                                            width: 33px;\n                                            padding: 5px;\n                                            margin-bottom: 5px;\n                                            border: 2px solid ghostwhite;" > \n                                        \n                                             \n                                                    \n                                                    17\n                                                    \n                                                  </button>\n                                      </div>\n                                    </ion-col>\n                                    <ion-col size="3" offset="3">\n                                      <div>\n\n                                            <button *ngIf="gig == \'18\'" style="background-color: ghostwhite;\n                                            width: 33px;\n                                            padding: 5px;\n                                            margin-bottom: 5px;\n                                            border: 3px solid black;" > \n                                        \n                                             \n                                                    \n                                                    18\n                                                    \n                                                  </button>\n\n                                            <button  *ngIf="gig != \'18\'" (click)="setNum(18)" style="background-color: ghostwhite;\n                                            width: 33px;\n                                            padding: 5px;\n                                            margin-bottom: 5px;\n                                            border: 2px solid ghostwhite;\n                                            " > \n                                        \n                                             \n                                                    \n                                                    18\n                                                    \n                                                  </button>\n                                      </div>\n                                    </ion-col>\n                                  </ion-row>\n                              </div>\n                            </ion-col>\n                            <ion-col style="    margin-top: 5px;">\n                              <div>\n                                <ion-row>\n                                    <ion-col size="3">\n                                      <div>\n\n                                            <button *ngIf="gig == \'19\'" style="background-color: ghostwhite;\n                                            width: 33px;\n                                            padding: 5px;\n                                            margin-bottom: 5px;\n                                            border: 3px solid black;" > \n                                        \n                                             \n                                                    \n                                                    19\n                                                    \n                                                  </button>\n\n                                            <button *ngIf="gig != \'19\'" (click)="setNum(19)"  style="background-color: ghostwhite;\n                                            width: 33px;\n                                            padding: 5px;\n                                            margin-bottom: 5px;\n                                            border: 2px solid ghostwhite;\n                                            " > \n                                        \n                                             \n                                                    \n                                                    19\n                                                    \n                                                  </button>\n                                      </div>\n                                    </ion-col>\n                                    <ion-col size="3" offset="3">\n                                      <div>\n\n                                            <button *ngIf="gig == \'20\'" style="background-color: ghostwhite;\n                                            width: 33px;\n                                            padding: 5px;\n                                            margin-bottom: 5px;\n                                            border: 3px solid black;" > \n                                        \n                                             \n                                                    \n                                                    20\n                                                    \n                                                  </button>\n\n                                            <button  *ngIf="gig != \'20\'"  (click)="setNum(20)" style="background-color: ghostwhite;\n                                            width: 33px;\n                                            padding: 5px;\n                                            margin-bottom: 5px;\n                                            border: 2px solid ghostwhite;\n                                            " > \n                                        \n                                             \n                                                    \n                                                    20\n                                                    \n                                                  </button>\n                                      </div>\n                                    </ion-col>\n                                  </ion-row>\n                              </div>\n                            </ion-col>\n                            <ion-col size="auto" style="    margin-top: 5px;">\n                              <div>\n                                <ion-row>\n                                    <ion-col size="3">\n                                      <div>\n                                            <button  style="background-color: ghostwhite;\n                                            width: 33px;\n                                            padding: 5px;\n                                            margin-bottom: 5px;\n                                            border: 2px solid ghostwhite;\n                                            visibility: hidden;\n                                            " > \n                                        \n                                             \n                                                    \n                                                    13\n                                                    \n                                                  </button>\n                                      </div>\n                                    </ion-col>\n                                    <ion-col size="3" offset="3">\n                                      <div>\n                                            <button  style="background-color: ghostwhite;\n                                            width: 33px;\n                                            padding: 5px;\n                                            margin-bottom: 5px;\n                                            border: 2px solid ghostwhite;\n                                            visibility: hidden;\n                                            " > \n                                        \n                                             \n                                                    \n                                                   14\n                                                    \n                                                  </button>\n                                      </div>\n                                    </ion-col>\n                                  </ion-row>\n                              </div>\n                            </ion-col>\n                            <ion-col style="    margin-top: 5px;">\n                              <div>\n                                <ion-row>\n                                    <ion-col size="3">\n                                      <div>\n                                            <button  style="background-color: ghostwhite;\n                                            width: 33px;\n                                            padding: 5px;\n                                            margin-bottom: 5px;\n                                            border: 2px solid ghostwhite;\n                                            visibility: hidden;\n                                            " > \n                                             \n                                                    \n                                                    15\n                                                    \n                                                  </button>\n                                      </div>\n                                    </ion-col>\n                                    <ion-col size="3" offset="3">\n                                      <div>\n                                            <button  style="background-color: ghostwhite;\n                                            width: 33px;\n                                            padding: 5px;\n                                            margin-bottom: 5px;\n                                            border: 2px solid ghostwhite;\n                                            visibility: hidden;\n                                            " > \n                                        \n                                             \n                                                    \n                                                    16\n                                                    \n                                                  </button>\n                                      </div>\n                                    </ion-col>\n                                  </ion-row>\n                              </div>\n                            </ion-col>\n                          </ion-row> <!--tyt-->\n                   \n                  </ion-grid>\n      \n      \n              </ion-footer>\n            \n      \n          </ion-list >\n      \n          <style>\n          \n          .card-content-ios {\n           padding: 0px;\n          font-size: 1.4rem;\n          line-height: 1.4;\n      }\n      \n      #over img {\n          margin-left: auto;\n          margin-right: auto;\n          display: block;\n      }\n      \n          </style>\n      \n      </ion-content>\n      '/*ion-inline-end:"F:\AppVilo\ALL_PROJECT\Juliia projects\Teory\mobile\MentorCard\src\pages\practice\practice.html"*/,
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1_ionic_angular__["i" /* NavController */], __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["j" /* NavParams */],
            __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["a" /* AlertController */]])
    ], PracticePage);
    return PracticePage;
}());

//# sourceMappingURL=practice.js.map

/***/ }),

/***/ 170:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return MockTestPage; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_ionic_angular__ = __webpack_require__(12);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__end_test_mock_end_test_mock__ = __webpack_require__(101);
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};






/**
 * Generated class for the MockTestPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */
var MockTestPage = /** @class */ (function () {
    function MockTestPage(navCtrl, navParams, alertCtrl) {
        this.navCtrl = navCtrl;
        this.navParams = navParams;
        this.alertCtrl = alertCtrl;
        this.buttonColor = '#008000';
        this.buttonColor2 = '#fff';
        this.colorString = '#fff';
        this.colorString2 = '#000';
        this.gig = 1;
    }
    MockTestPage.prototype.ionViewDidLoad = function () {
        console.log('ionViewDidLoad MockTestPage');
    };
    MockTestPage.prototype.next = function () {
        if (this.gig < 20) {
            this.gig = this.gig + 1;
            this.slides.slideNext();
        }
    };
    MockTestPage.prototype.sdat = function () {
        this.navCtrl.setRoot(__WEBPACK_IMPORTED_MODULE_2__end_test_mock_end_test_mock__["a" /* EndTestMockPage */]);
    };
    MockTestPage.prototype.prev = function () {
        if (this.gig > 1) {
            this.gig = this.gig - 1;
            this.slides.slidePrev();
        }
    };
    MockTestPage.prototype.openFilters2 = function () {
        this.buttonColor = '#008000';
        this.buttonColor2 = '#fff';
        this.colorString = '#fff';
        this.colorString2 = '#000';
        this.gig = 1;
        this.slides.slideTo(0);
    };
    MockTestPage.prototype.openFilters = function () {
        this.buttonColor = '#fff';
        this.buttonColor2 = '#008000';
        this.colorString = '#000';
        this.colorString2 = '#fff';
        this.gig = 1;
        this.slides.slideTo(0);
    };
    MockTestPage.prototype.setNum = function (num) {
        this.slides.slideTo(num - 1);
        this.gig = num;
    };
    MockTestPage.prototype.showConfirm = function () {
        var _this = this;
        var confirm = this.alertCtrl.create({
            title: 'Confirm',
            message: 'Are you sure you want to submit?',
            buttons: [
                {
                    text: 'No',
                    role: 'cancel',
                    handler: function () {
                        console.log('Disagree clicked');
                    }
                },
                {
                    text: 'Yes',
                    handler: function () {
                        _this.sdat();
                    }
                }
            ]
        });
        confirm.present();
    };
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_8" /* ViewChild */])('slides'),
        __metadata("design:type", __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["l" /* Slides */])
    ], MockTestPage.prototype, "slides", void 0);
    MockTestPage = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["m" /* Component */])({
            selector: 'page-mock-test',template:/*ion-inline-start:"F:\AppVilo\ALL_PROJECT\Juliia projects\Teory\mobile\MentorCard\src\pages\mock-test\mock-test.html"*/'<!--\n  Generated template for the PracticePage page.\n\n  See http://ionicframework.com/docs/components/#navigation for more info on\n  Ionic pages and navigation.\n-->\n<ion-header>\n\n        <ion-navbar>\n            <button ion-button menuToggle>\n                <ion-icon name="menu"></ion-icon>\n              </button>\n          <ion-title *ngIf="gig==\'1\'">1.1.02.101</ion-title>\n          <ion-title *ngIf="gig==\'2\'">1.1.02.102</ion-title>\n          <ion-title *ngIf="gig==\'3\'">1.1.02.103</ion-title>\n          <ion-title *ngIf="gig==\'4\'">1.1.02.104</ion-title>\n          <ion-title *ngIf="gig==\'5\'">1.1.02.105</ion-title>\n          <ion-title *ngIf="gig==\'6\'">1.1.02.106</ion-title>\n          <ion-title *ngIf="gig==\'7\'">1.1.02.107</ion-title>\n          <ion-title *ngIf="gig==\'8\'">1.1.02.108</ion-title>\n          <ion-title *ngIf="gig==\'9\'">1.1.02.109</ion-title>\n          <ion-title *ngIf="gig==\'10\'">1.1.02.111</ion-title>\n          <ion-title *ngIf="gig==\'11\'">1.1.02.121</ion-title>\n          <ion-title *ngIf="gig==\'12\'">1.1.02.131</ion-title>\n          <ion-title *ngIf="gig==\'13\'">1.1.02.141</ion-title>\n          <ion-title *ngIf="gig==\'14\'">1.1.02.151</ion-title>\n          <ion-title *ngIf="gig==\'15\'">1.1.02.161</ion-title>\n          <ion-title *ngIf="gig==\'16\'">1.1.02.171</ion-title>\n          <ion-title *ngIf="gig==\'17\'">1.1.02.181</ion-title>\n          <ion-title *ngIf="gig==\'18\'">1.1.02.191</ion-title>\n          <ion-title *ngIf="gig==\'19\'">1.1.02.131</ion-title>\n          <ion-title *ngIf="gig==\'20\'">1.1.02.141</ion-title>\n          <ion-buttons end>\n              Points: 4\n            </ion-buttons>\n        </ion-navbar>\n      \n      </ion-header>\n      \n      \n      <ion-content >\n          <ion-list >\n          <ion-slides #slides>\n    \n                <ion-slide >\n                      \n                            <ion-item no-lines>\n                              \n                                <h2 ><b>The cyclist in front of me will?</b></h2>\n                             \n                             \n                            </ion-item >\n                          \n                            \n                            <div id="over" style="margin: 5px; ">\n                                <img     src="assets/imgs/stu_standart.png">\n                            </div>\n                          \n                            <ion-card-content>\n                                <ion-item no-lines>\n                                     <ion-label><b>- turn to the left</b></ion-label>\n                                    <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                  </ion-item>\n                                  <ion-item no-lines>\n                                      <ion-label><b>- go to the other side of the road</b></ion-label>\n                                      <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                    </ion-item>\n                                    <ion-item no-lines>\n                                         <ion-label><b>- not impede me as i proceed</b></ion-label>\n                                        <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                      </ion-item>\n                            </ion-card-content>\n                          \n                            \n                          \n                         \n                    </ion-slide>\n                    <ion-slide >\n                          \n                \n                                <ion-item no-lines>\n                                  \n                                          <h2 ><b>The cyclist in front of me will?</b></h2>\n                                       \n              \n                                </ion-item >\n                              \n                                \n                                <div id="over" style="margin: 5px; ">\n                                    <img     src="assets/imgs/stu_standart.png">\n                                </div>\n                              \n                                <ion-card-content>\n                                    <ion-item no-lines>\n                                         <ion-label><b>- turn to the left</b></ion-label>\n                                        <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                      </ion-item>\n                                      <ion-item no-lines>\n                                          <ion-label><b>- go to the other side of the road</b></ion-label>\n                                          \n                                          <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                        </ion-item>\n                                        <ion-item no-lines>\n                                             <ion-label><b>- not impede me as i proceed</b></ion-label>\n                                           \n                                            <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                          </ion-item>\n                                </ion-card-content>\n                              \n                                \n                              \n                            \n                        </ion-slide>\n                        <ion-slide >\n                              \n                    \n                                    <ion-item no-lines>\n                                      \n                                              <h2 ><b>The cyclist in front of me will?</b></h2>\n                                           \n                  \n                                    </ion-item >\n                                  \n                                    \n                                    <div id="over" style="margin: 5px; ">\n                                        <img     src="assets/imgs/stu_standart.png">\n                                    </div>\n                                  \n                                    <ion-card-content>\n                                        <ion-item no-lines>\n                                             <ion-label><b>- turn to the left</b></ion-label>\n                                            <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                          </ion-item>\n                                          <ion-item no-lines>\n                                              <ion-label><b>- go to the other side of the road</b></ion-label>\n                                              <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                            </ion-item>\n                                            <ion-item no-lines>\n                                                 <ion-label><b>- not impede me as i proceed</b></ion-label>\n                                                <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                              </ion-item>\n                                    </ion-card-content>\n                                  \n                                    \n                                  \n                                \n                            </ion-slide>\n                            <ion-slide >\n                                  \n                        \n                                        <ion-item no-lines>\n                                          \n                                                  <h2 ><b>The cyclist in front of me will?</b></h2>\n                                               \n                      \n                                        </ion-item >\n                                      \n                                        \n                                        <div id="over" style="margin: 5px; ">\n                                            <img     src="assets/imgs/stu_standart.png">\n                                        </div>\n                                      \n                                        <ion-card-content>\n                                            <ion-item no-lines>\n                                                 <ion-label><b>- turn to the left</b></ion-label>\n                                                <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                              </ion-item>\n                                              <ion-item no-lines>\n                                                  <ion-label><b>- go to the other side of the road</b></ion-label>\n                                                  <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                </ion-item>\n                                                <ion-item no-lines>\n                                                     <ion-label><b>- not impede me as i proceed</b></ion-label>\n                                                    <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                  </ion-item>\n                                        </ion-card-content>\n                                      \n                                        \n                                      \n                                    \n                                </ion-slide>\n                                <ion-slide >\n                                      \n                            \n                                            <ion-item no-lines>\n                                              \n                                                      <h2 ><b>The cyclist in front of me will?</b></h2>\n                                                   \n                          \n                                            </ion-item >\n                                          \n                                            \n                                            <div id="over" style="margin: 5px; ">\n                                                <img     src="assets/imgs/stu_standart.png">\n                                            </div>\n                                          \n                                            <ion-card-content>\n                                                <ion-item no-lines>\n                                                     <ion-label><b>- turn to the left</b></ion-label>\n                                                    <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                  </ion-item>\n                                                  <ion-item no-lines>\n                                                      <ion-label><b>- go to the other side of the road</b></ion-label>\n                                                      <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                    </ion-item>\n                                                    <ion-item no-lines>\n                                                         <ion-label><b>- not impede me as i proceed</b></ion-label>\n                                                        <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                      </ion-item>\n                                            </ion-card-content>\n                                          \n                                            \n                                          \n                                        \n                                    </ion-slide>\n                                    <ion-slide >\n                                          \n                                \n                                                <ion-item no-lines>\n                                                  \n                                                          <h2 ><b>The cyclist in front of me will?</b></h2>\n                                                       \n                              \n                                                </ion-item >\n                                              \n                                                \n                                                <div id="over" style="margin: 5px; ">\n                                                    <img     src="assets/imgs/stu_standart.png">\n                                                </div>\n                                              \n                                                <ion-card-content>\n                                                    <ion-item no-lines>\n                                                         <ion-label><b>- turn to the left</b></ion-label>\n                                                        <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                      </ion-item>\n                                                      <ion-item no-lines>\n                                                          <ion-label><b>- go to the other side of the road</b></ion-label>\n                                                          <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                        </ion-item>\n                                                        <ion-item no-lines>\n                                                             <ion-label><b>- not impede me as i proceed</b></ion-label>\n                                                            <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                          </ion-item>\n                                                </ion-card-content>\n                                              \n                                                \n                                              \n                                            \n                                        </ion-slide>\n                                        <ion-slide >\n                                              \n                                    \n                                                    <ion-item no-lines>\n                                                      \n                                                              <h2 ><b>The cyclist in front of me will?</b></h2>\n                                                           \n                                  \n                                                    </ion-item >\n                                                  \n                                                    \n                                                    <div id="over" style="margin: 5px; ">\n                                                        <img     src="assets/imgs/stu_standart.png">\n                                                    </div>\n                                                  \n                                                    <ion-card-content>\n                                                        <ion-item no-lines>\n                                                             <ion-label><b>- turn to the left</b></ion-label>\n                                                            <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                          </ion-item>\n                                                          <ion-item no-lines>\n                                                              <ion-label><b>- go to the other side of the road</b></ion-label>\n                                                              <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                            </ion-item>\n                                                            <ion-item no-lines>\n                                                                 <ion-label><b>- not impede me as i proceed</b></ion-label>\n                                                                <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                              </ion-item>\n                                                    </ion-card-content>\n                                                  \n                                                    \n                                                  \n                                                \n                                            </ion-slide>\n                                            <ion-slide >\n                                                  \n                                        \n                                                        <ion-item no-lines>\n                                                          \n                                                                  <h2 ><b>The cyclist in front of me will?</b></h2>\n                                                               \n                                      \n                                                        </ion-item >\n                                                      \n                                                        \n                                                        <div id="over" style="margin: 5px; ">\n                                                            <img     src="assets/imgs/stu_standart.png">\n                                                        </div>\n                                                      \n                                                        <ion-card-content>\n                                                            <ion-item no-lines>\n                                                                 <ion-label><b>- turn to the left</b></ion-label>\n                                                                <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                              </ion-item>\n                                                              <ion-item no-lines>\n                                                                  <ion-label><b>- go to the other side of the road</b></ion-label>\n                                                                  <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                </ion-item>\n                                                                <ion-item no-lines>\n                                                                     <ion-label><b>- not impede me as i proceed</b></ion-label>\n                                                                    <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                  </ion-item>\n                                                        </ion-card-content>\n                                                      \n                                                        \n                                                      \n                                                    \n                                                </ion-slide>\n                                                <ion-slide >\n                                                      \n                                            \n                                                            <ion-item no-lines>\n                                                              \n                                                                      <h2 ><b>The cyclist in front of me will?</b></h2>\n                                                                   \n                                          \n                                                            </ion-item >\n                                                          \n                                                            \n                                                            <div id="over" style="margin: 5px; ">\n                                                                <img     src="assets/imgs/stu_standart.png">\n                                                            </div>\n                                                          \n                                                            <ion-card-content>\n                                                                <ion-item no-lines>\n                                                                     <ion-label><b>- turn to the left</b></ion-label>\n                                                                    <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                  </ion-item>\n                                                                  <ion-item no-lines>\n                                                                      <ion-label><b>- go to the other side of the road</b></ion-label>\n                                                                      <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                    </ion-item>\n                                                                    <ion-item no-lines>\n                                                                         <ion-label><b>- not impede me as i proceed</b></ion-label>\n                                                                        <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                      </ion-item>\n                                                            </ion-card-content>\n                                                          \n                                                            \n                                                          \n                                                        \n                                                    </ion-slide>\n                                                    <ion-slide >\n                                                          \n                                                \n                                                                <ion-item no-lines>\n                                                                  \n                                                                          <h2 ><b>The cyclist in front of me will?</b></h2>\n                                                                       \n                                              \n                                                                </ion-item >\n                                                              \n                                                                \n                                                                <div id="over" style="margin: 5px; ">\n                                                                    <img     src="assets/imgs/stu_standart.png">\n                                                                </div>\n                                                              \n                                                                <ion-card-content>\n                                                                    <ion-item no-lines>\n                                                                         <ion-label><b>- turn to the left</b></ion-label>\n                                                                        <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                      </ion-item>\n                                                                      <ion-item no-lines>\n                                                                          <ion-label><b>- go to the other side of the road</b></ion-label>\n                                                                          <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                        </ion-item>\n                                                                        <ion-item no-lines>\n                                                                             <ion-label><b>- not impede me as i proceed</b></ion-label>\n                                                                            <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                          </ion-item>\n                                                                </ion-card-content>\n                                                              \n                                                                \n                                                              \n                                                            \n                                                        </ion-slide>\n                                                        <ion-slide >\n                                                              \n                                                    \n                                                                    <ion-item no-lines>\n                                                                      \n                                                                              <h2 ><b>The cyclist in front of me will?</b></h2>\n                                                                           \n                                                                    </ion-item >\n                                                                  \n                                                                    \n                                                                    <div id="over" style="margin: 5px; ">\n                                                                        <img     src="assets/imgs/stu_standart.png">\n                                                                    </div>\n                                                                  \n                                                                    <ion-card-content>\n                                                                        <ion-item no-lines>\n                                                                             <ion-label><b>- turn to the left</b></ion-label>\n                                                                            <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                          </ion-item>\n                                                                          <ion-item no-lines>\n                                                                              <ion-label><b>- go to the other side of the road</b></ion-label>\n                                                                              <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                            </ion-item>\n                                                                            <ion-item no-lines>\n                                                                                 <ion-label><b>- not impede me as i proceed</b></ion-label>\n                                                                                <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                              </ion-item>\n                                                                    </ion-card-content>\n                                                                  \n                                                                    \n                                                                  \n                                                                \n                                                            </ion-slide>\n                                                            <ion-slide >\n                                                                  \n                                                        \n                                                                        <ion-item no-lines>\n                                                                          \n                                                                                  <h2 ><b>The cyclist in front of me will?</b></h2>\n                                                                               \n                                                      \n                                                                        </ion-item >\n                                                                      \n                                                                        \n                                                                        <div id="over" style="margin: 5px; ">\n                                                                            <img     src="assets/imgs/stu_standart.png">\n                                                                        </div>\n                                                                      \n                                                                        <ion-card-content>\n                                                                            <ion-item no-lines>\n                                                                                 <ion-label><b>- turn to the left</b></ion-label>\n                                                                                <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                              </ion-item>\n                                                                              <ion-item no-lines>\n                                                                                  <ion-label><b>- go to the other side of the road</b></ion-label>\n                                                                                  <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                                </ion-item>\n                                                                                <ion-item no-lines>\n                                                                                     <ion-label><b>- not impede me as i proceed</b></ion-label>\n                                                                                    <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                                  </ion-item>\n                                                                        </ion-card-content>\n                                                                      \n                                                                        \n                                                                      \n                                                                    \n                                                                </ion-slide>\n                                                                <ion-slide >\n                                                                      \n                                                            \n                                                                            <ion-item no-lines>\n                                                                              \n                                                                                      <h2 ><b>The cyclist in front of me will?</b></h2>\n                                                                                   \n                                                          \n                                                                            </ion-item >\n                                                                          \n                                                                            \n                                                                            <div id="over" style="margin: 5px; ">\n                                                                                <img     src="assets/imgs/stu_standart.png">\n                                                                            </div>\n                                                                          \n                                                                            <ion-card-content>\n                                                                                <ion-item no-lines>\n                                                                                     <ion-label><b>- turn to the left</b></ion-label>\n                                                                                    <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                                  </ion-item>\n                                                                                  <ion-item no-lines>\n                                                                                      <ion-label><b>- go to the other side of the road</b></ion-label>\n                                                                                      <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                                    </ion-item>\n                                                                                    <ion-item no-lines>\n                                                                                         <ion-label><b>- not impede me as i proceed</b></ion-label>\n                                                                                        <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                                      </ion-item>\n                                                                            </ion-card-content>\n                                                                          \n                                                                            \n                                                                          \n                                                                        \n                                                                    </ion-slide>\n                                                                    <ion-slide >\n                                                                          \n                                                                \n                                                                                <ion-item no-lines>\n                                                                                  \n                                                                                          <h2 ><b>The cyclist in front of me will?</b></h2>\n                                                                                       \n                                                              \n                                                                                </ion-item >\n                                                                              \n                                                                                \n                                                                                <div id="over" style="margin: 5px; ">\n                                                                                    <img     src="assets/imgs/stu_standart.png">\n                                                                                </div>\n                                                                              \n                                                                                <ion-card-content>\n                                                                                    <ion-item no-lines>\n                                                                                         <ion-label><b>- turn to the left</b></ion-label>\n                                                                                        <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                                      </ion-item>\n                                                                                      <ion-item no-lines>\n                                                                                          <ion-label><b>- go to the other side of the road</b></ion-label>\n                                                                                          <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                                        </ion-item>\n                                                                                        <ion-item no-lines>\n                                                                                             <ion-label><b>- not impede me as i proceed</b></ion-label>\n                                                                                            <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                                          </ion-item>\n                                                                                </ion-card-content>\n                                                                              \n                                                                                \n                                                                              \n                                                                            \n                                                                        </ion-slide>\n                                                                        <ion-slide >\n                                                                              \n                                                                    \n                                                                                    <ion-item no-lines>\n                                                                                      \n                                                                                              <h2 ><b>The cyclist in front of me will?</b></h2>\n                                                                                           \n                                                                  \n                                                                                    </ion-item >\n                                                                                  \n                                                                                    \n                                                                                    <div id="over" style="margin: 5px; ">\n                                                                                        <img     src="assets/imgs/stu_standart.png">\n                                                                                    </div>\n                                                                                  \n                                                                                    <ion-card-content>\n                                                                                        <ion-item no-lines>\n                                                                                             <ion-label><b>- turn to the left</b></ion-label>\n                                                                                            <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                                          </ion-item>\n                                                                                          <ion-item no-lines>\n                                                                                              <ion-label><b>- go to the other side of the road</b></ion-label>\n                                                                                              <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                                            </ion-item>\n                                                                                            <ion-item no-lines>\n                                                                                                 <ion-label><b>- not impede me as i proceed</b></ion-label>\n                                                                                                <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                                              </ion-item>\n                                                                                    </ion-card-content>\n                                                                                  \n                                                                                    \n                                                                                  \n                                                                                \n                                                                            </ion-slide>\n                                                                            <ion-slide >\n                                                                                  \n                                                                        \n                                                                                        <ion-item no-lines>\n                                                                                          \n                                                                                                  <h2 ><b>The cyclist in front of me will?</b></h2>\n                                                                                               \n                                                                      \n                                                                                        </ion-item >\n                                                                                      \n                                                                                        \n                                                                                        <div id="over" style="margin: 5px; ">\n                                                                                            <img     src="assets/imgs/stu_standart.png">\n                                                                                        </div>\n                                                                                      \n                                                                                        <ion-card-content>\n                                                                                            <ion-item no-lines>\n                                                                                                 <ion-label><b>- turn to the left</b></ion-label>\n                                                                                                <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                                              </ion-item>\n                                                                                              <ion-item no-lines>\n                                                                                                  <ion-label><b>- go to the other side of the road</b></ion-label>\n                                                                                                  <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                                                </ion-item>\n                                                                                                <ion-item no-lines>\n                                                                                                     <ion-label><b>- not impede me as i proceed</b></ion-label>\n                                                                                                    <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                                                  </ion-item>\n                                                                                        </ion-card-content>\n                                                                                      \n                                                                                        \n                                                                                      \n                                                                                    \n                                                                                </ion-slide>\n                                                                                <ion-slide >\n                                                                                      \n                                                                            \n                                                                                            <ion-item no-lines>\n                                                                                              \n                                                                                                      <h2 ><b>The cyclist in front of me will?</b></h2>\n                                                                                                   \n                                                                          \n                                                                                            </ion-item >\n                                                                                          \n                                                                                            \n                                                                                            <div id="over" style="margin: 5px; ">\n                                                                                                <img     src="assets/imgs/stu_standart.png">\n                                                                                            </div>\n                                                                                          \n                                                                                            <ion-card-content>\n                                                                                                <ion-item no-lines>\n                                                                                                     <ion-label><b>- turn to the left</b></ion-label>\n                                                                                                    <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                                                  </ion-item>\n                                                                                                  <ion-item no-lines>\n                                                                                                      <ion-label><b>- go to the other side of the road</b></ion-label>\n                                                                                                      <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                                                    </ion-item>\n                                                                                                    <ion-item no-lines>\n                                                                                                         <ion-label><b>- not impede me as i proceed</b></ion-label>\n                                                                                                        <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                                                                                      </ion-item>\n                                                                                            </ion-card-content>\n                                                                                          \n                                                                                            \n                                                                                          \n                                                                                        \n                                                                                    </ion-slide>\n    \n      \n              <ion-slide >\n                \n      \n                      <ion-item no-lines>\n                        \n                              <h2 ><b>The cyclist in front of me will?</b></h2>\n                           \n    \n                      </ion-item >\n                    \n                      \n                      <div id="over" style="margin: 5px; ">\n                          <img     src="assets/imgs/stu_standart.png">\n                      </div>\n                    \n                      <ion-card-content>\n                          <ion-item no-lines>\n                               <ion-label><b>- turn to the left</b></ion-label>\n                              <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                            </ion-item>\n                            <ion-item no-lines>\n                                <ion-label><b>- go to the other side of the road</b></ion-label>\n                                <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                              </ion-item>\n                              <ion-item no-lines>\n                                   <ion-label><b>- not impede me as i proceed</b></ion-label>\n                                  <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                </ion-item>\n                      </ion-card-content>\n                    \n                      \n                    \n                  \n              </ion-slide>\n            \n              <ion-slide >\n                \n      \n                      <ion-item no-lines>\n                        \n                              <h2 ><b>The cyclist in front of me will?</b></h2>\n                           \n        \n                      </ion-item>\n                    \n                      <div id="over" style="margin: 5px; ">\n                          <img     src="assets/imgs/stu_standart.png">\n                      </div>\n                      <ion-card-content>\n                          <ion-item no-lines>\n                               <ion-label><b>- turn to the left</b></ion-label>\n                              <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                            </ion-item>\n                            <ion-item no-lines>\n                                <ion-label><b>- go to the other side of the road</b></ion-label>\n                                <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                              </ion-item>\n                              <ion-item no-lines>\n                                   <ion-label><b>- not impede me as i proceed</b></ion-label>\n                                  <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                </ion-item>\n                      </ion-card-content>\n                    \n                      \n                    \n                  \n              </ion-slide>\n            \n              <ion-slide >\n                \n      \n                      <ion-item no-lines>\n                        \n                              <h2 ><b>The cyclist in front of me will?</b></h2>\n                           \n        \n                      </ion-item>\n                    \n                      <div id="over" style="margin: 5px; ">\n                          <img  src="assets/imgs/stu_standart.png">\n                      </div>\n                    \n                      <ion-card-content>\n                          <ion-item no-lines>\n                               <ion-label><b>- turn to the left</b></ion-label>\n                              <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                            </ion-item>\n                            <ion-item no-lines>\n                                <ion-label><b>- go to the other side of the road</b></ion-label>\n                                <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                              </ion-item>\n                              <ion-item no-lines>\n                                   <ion-label><b>- not impede me as i proceed</b></ion-label>\n                                  <ion-checkbox color="dark" checked="false"></ion-checkbox>\n                                </ion-item>\n                      </ion-card-content>\n                    \n                      \n                    \n                  \n              </ion-slide>\n            \n            </ion-slides>\n      \n      \n            <ion-footer align-title="center">\n                <ion-grid style="margin-bottom: 15px;">\n                    <ion-row>\n                      \n                          <ion-col >\n                          \n                          </ion-col>\n                     \n                      <ion-col  >\n                        \n                          \n                          <ion-grid >\n                            <ion-row>\n                              <ion-col>\n                                <div>\n                                  \n\n                                      <button ion-button small (click)=" showConfirm()" color="danger"> \n                                    \n                                         \n                                            <ion-icon slot="icon-only" name="log-out"></ion-icon>\n                                        </button>\n\n                                </div>\n                              </ion-col>\n                              <ion-col>\n                                <div>\n                                        <button ion-button small (click)=" prev()" style="background-color: #FFA500;width: 53px;" > \n                                    \n                                         \n                                                \n                                                <ion-icon slot="icon-only" name="arrow-back"></ion-icon>\n                                                \n                                              </button>\n                                </div>\n                              </ion-col>\n                              <ion-col>\n                                <div>\n                                        <button ion-button small  (click)=" next()" style="background-color: #008000;width: 53px;"> \n                                    \n                                         \n                                                \n                                                <ion-icon slot="icon-only" name="arrow-forward"></ion-icon>\n                                              </button>\n                                </div>\n                              </ion-col>\n                            </ion-row>\n                          </ion-grid>\n                          \n\n                      </ion-col>\n      \n                     \n    \n    \n    \n                    </ion-row>\n                    \n                  </ion-grid>\n      \n                <ion-grid text-center >\n                    <ion-row >\n                            <ion-row>\n                                    <ion-col size="3">\n                                      <div>\n                                            <button class="button_basic" (click)=\'openFilters2()\' [ngStyle]="{\'background-color\': buttonColor, \'color\': colorString}" style="margin: 0px;width: 60px;    width: 150px;">Basic Material</button>\n                                                  \n                                      </div>\n                                    </ion-col>\n                                    <ion-col size="3" offset="3">\n                                      <div>\n                                            <button class="button_basic" (click)=\'openFilters()\' [ngStyle]="{\'background-color\': buttonColor2, \'color\': colorString2}"  style="margin: 0px;width: 40px;">B</button>\n                                      </div>\n                                    </ion-col>\n                                  </ion-row>\n                      </ion-row>\n\n\n                      <ion-row style="background-color: #008000">\n                        <ion-col  style="    margin-top: 5px;">\n                          <div>\n                            <ion-row>\n                                <ion-col size="3">\n                                  <div>\n                                        <button *ngIf="gig == \'1\'" style="background-color: ghostwhite;\n                                        width: 33px;\n                                        padding: 5px;\n                                        margin-bottom: 5px;\n                                        border: 3px solid black;" > \n                                    \n                                         \n                                                \n                                                1\n                                                \n                                              </button>\n\n                                              <button *ngIf="gig != \'1\'"  (click)="setNum(1)" style="background-color: ghostwhite;\n                                        width: 33px;\n                                        padding: 5px;\n                                        margin-bottom: 5px;\n                                        border: 2px solid ghostwhite;" > \n                                    \n                                         \n                                                \n                                                1\n                                                \n                                              </button>\n                                  </div>\n                                </ion-col>\n                                <ion-col size="3" offset="3">\n                                  <div>\n\n                                        <button *ngIf="gig == \'2\'" style="background-color: ghostwhite;\n                                        width: 33px;\n                                        padding: 5px;\n                                        margin-bottom: 5px;\n                                        border: 3px solid black;" > \n                                    \n                                         \n                                                \n                                                2\n                                                \n                                              </button>\n\n                                        <button *ngIf="gig != \'2\'" (click)="setNum(2)" style="background-color: ghostwhite;\n                                        width: 33px;\n                                        padding: 5px;\n                                        margin-bottom: 5px;\n                                        border: 2px solid ghostwhite;\n                                        " > \n                                    \n                                         \n                                                \n                                                2\n                                                \n                                              </button>\n                                  </div>\n                                </ion-col>\n                              </ion-row>\n                          </div>\n                        </ion-col>\n                        <ion-col style="    margin-top: 5px;">\n                          <div>\n                            <ion-row>\n                                <ion-col size="3">\n                                  <div>\n\n                                    \n                                        <button *ngIf="gig == \'3\'" style="background-color: ghostwhite;\n                                        width: 33px;\n                                        padding: 5px;\n                                        margin-bottom: 5px;\n                                        border: 3px solid black;" > \n                                    \n                                         \n                                                \n                                                3\n                                                \n                                              </button>\n\n                                        <button *ngIf="gig != \'3\'"  (click)="setNum(3)" style="background-color: ghostwhite;\n                                        width: 33px;\n                                        padding: 5px;\n                                        margin-bottom: 5px;\n                                        border: 2px solid ghostwhite;\n                                        " > \n                                    \n                                         \n                                                \n                                                3\n                                                \n                                              </button>\n                                  </div>\n                                </ion-col>\n                                <ion-col size="3" offset="3">\n                                  <div>\n\n                                        <button *ngIf="gig == \'4\'"  style="background-color: ghostwhite;\n                                        width: 33px;\n                                        padding: 5px;\n                                        margin-bottom: 5px;\n                                        border: 3px solid black;" > \n                                    \n                                         \n                                                \n                                                4\n                                                \n                                              </button>\n\n                                        <button *ngIf="gig != \'4\'"  (click)="setNum(4)" style="background-color: ghostwhite;\n                                        width: 33px;\n                                        padding: 5px;\n                                        margin-bottom: 5px;\n                                        border: 2px solid ghostwhite;\n                                        " > \n                                    \n                                         \n                                                \n                                                4\n                                                \n                                              </button>\n                                  </div>\n                                </ion-col>\n                              </ion-row>\n                          </div>\n                        </ion-col>\n                        <ion-col size="auto" style="    margin-top: 5px;">\n                          <div>\n                            <ion-row>\n                                <ion-col size="3">\n                                  <div>\n\n                                        <button *ngIf="gig == \'5\'" style="background-color: ghostwhite;\n                                        width: 33px;\n                                        padding: 5px;\n                                        margin-bottom: 5px;\n                                        border: 3px solid black;" > \n                                    \n                                         \n                                                \n                                                5\n                                                \n                                              </button>\n\n                                        <button  *ngIf="gig != \'5\'" (click)="setNum(5)" style="background-color: ghostwhite;\n                                        width: 33px;\n                                        padding: 5px;\n                                        margin-bottom: 5px;\n                                        border: 2px solid ghostwhite;\n                                        " > \n                                    \n                                         \n                                                \n                                                5\n                                                \n                                              </button>\n                                  </div>\n                                </ion-col>\n                                <ion-col size="3" offset="3">\n                                  <div>\n\n                                        <button *ngIf="gig == \'6\'" style="background-color: ghostwhite;\n                                        width: 33px;\n                                        padding: 5px;\n                                        margin-bottom: 5px;\n                                        border: 3px solid black;" > \n                                    \n                                         \n                                                \n                                                6\n                                                \n                                              </button>\n\n                                        <button *ngIf="gig != \'6\'"  (click)="setNum(6)" style="background-color: ghostwhite;\n                                        width: 33px;\n                                        padding: 5px;\n                                        margin-bottom: 5px;\n                                        border: 2px solid ghostwhite;\n                                        " > \n                                    \n                                         \n                                                \n                                                6\n                                                \n                                              </button>\n                                  </div>\n                                </ion-col>\n                              </ion-row>\n                          </div>\n                        </ion-col>\n                        <ion-col style="    margin-top: 5px;">\n                          <div>\n                            <ion-row>\n                                <ion-col size="3">\n                                  <div>\n\n                                        <button *ngIf="gig == \'7\'" style="background-color: ghostwhite;\n                                        width: 33px;\n                                        padding: 5px;\n                                        margin-bottom: 5px;\n                                        border: 3px solid black;" > \n                                    \n                                         \n                                                \n                                                7\n                                                \n                                              </button>\n\n                                        <button  *ngIf="gig != \'7\'" (click)="setNum(7)" style="background-color: ghostwhite;\n                                        width: 33px;\n                                        padding: 5px;\n                                        margin-bottom: 5px;\n                                        border: 2px solid ghostwhite;\n                                        " > \n                                         \n                                                \n                                                7\n                                                \n                                              </button>\n                                  </div>\n                                </ion-col>\n                                <ion-col size="3" offset="3">\n                                  <div>\n\n                                        <button *ngIf="gig == \'8\'" style="background-color: ghostwhite;\n                                        width: 33px;\n                                        padding: 5px;\n                                        margin-bottom: 5px;\n                                        border: 3px solid black;" > \n                                    \n                                         \n                                                \n                                                8\n                                                \n                                              </button>\n\n                                        <button  *ngIf="gig != \'8\'" (click)="setNum(8)" style="background-color: ghostwhite;\n                                        width: 33px;\n                                        padding: 5px;\n                                        margin-bottom: 5px;\n                                        border: 2px solid ghostwhite;\n                                        " > \n                                    \n                                         \n                                                \n                                                8\n                                                \n                                              </button>\n                                  </div>\n                                </ion-col>\n                              </ion-row>\n                          </div>\n                        </ion-col>\n                      </ion-row> <!--tyt-->\n\n                      <ion-row style="background-color: #008000">\n                            <ion-col  style="    margin-top: 5px;">\n                              <div>\n                                <ion-row>\n                                    <ion-col size="3">\n                                      <div>\n\n                                            <button *ngIf="gig == \'9\'" style="background-color: ghostwhite;\n                                            width: 33px;\n                                            padding: 5px;\n                                            margin-bottom: 5px;\n                                            border: 3px solid black;" > \n                                        \n                                             \n                                                    \n                                                    9\n                                                    \n                                                  </button>\n\n                                            <button  *ngIf="gig != \'9\'" (click)="setNum(9)" style="background-color: ghostwhite;\n                                            width: 33px;\n                                            padding: 5px;\n                                            margin-bottom: 5px;\n                                            border: 2px solid ghostwhite;" > \n                                        \n                                             \n                                                    \n                                                    9\n                                                    \n                                                  </button>\n                                      </div>\n                                    </ion-col>\n                                    <ion-col size="3" offset="3">\n                                      <div>\n\n                                            <button *ngIf="gig == \'10\'" style="background-color: ghostwhite;\n                                            width: 33px;\n                                            padding: 5px;\n                                            margin-bottom: 5px;\n                                            border: 3px solid black;" > \n                                        \n                                             \n                                                    \n                                                    10\n                                                    \n                                                  </button>\n\n                                            <button *ngIf="gig != \'10\'"  (click)="setNum(10)" style="background-color: ghostwhite;\n                                            width: 33px;\n                                            padding: 5px;\n                                            margin-bottom: 5px;\n                                            border: 2px solid ghostwhite;\n                                            " > \n                                        \n                                             \n                                                    \n                                                    10\n                                                    \n                                                  </button>\n                                      </div>\n                                    </ion-col>\n                                  </ion-row>\n                              </div>\n                            </ion-col>\n                            <ion-col style="    margin-top: 5px;">\n                              <div>\n                                <ion-row>\n                                    <ion-col size="3">\n                                      <div>\n\n                                            <button *ngIf="gig == \'11\'" style="background-color: ghostwhite;\n                                            width: 33px;\n                                            padding: 5px;\n                                            margin-bottom: 5px;\n                                            border: 3px solid black;" > \n                                        \n                                             \n                                                    \n                                                    11\n                                                    \n                                                  </button>\n\n\n                                            <button  *ngIf="gig != \'11\'" (click)="setNum(11)" style="background-color: ghostwhite;\n                                            width: 33px;\n                                            padding: 5px;\n                                            margin-bottom: 5px;\n                                            border: 2px solid ghostwhite;\n                                            " > \n                                        \n                                             \n                                                    \n                                                    11\n                                                    \n                                                  </button>\n                                      </div>\n                                    </ion-col>\n                                    <ion-col size="3" offset="3">\n                                      <div>\n\n                                            <button *ngIf="gig == \'12\'" style="background-color: ghostwhite;\n                                            width: 33px;\n                                            padding: 5px;\n                                            margin-bottom: 5px;\n                                            border: 3px solid black;" > \n                                        \n                                             \n                                                    \n                                                    12\n                                                    \n                                                  </button>\n\n\n                                            <button *ngIf="gig != \'12\'" (click)="setNum(12)" style="background-color: ghostwhite;\n                                            width: 33px;\n                                            padding: 5px;\n                                            margin-bottom: 5px;\n                                            border: 2px solid ghostwhite;\n                                            " > \n                                        \n                                             \n                                                    \n                                                    12\n                                                    \n                                                  </button>\n                                      </div>\n                                    </ion-col>\n                                  </ion-row>\n                              </div>\n                            </ion-col>\n                            <ion-col size="auto" style="    margin-top: 5px;">\n                              <div>\n                                <ion-row>\n                                    <ion-col size="3">\n                                      <div>\n\n                                            <button *ngIf="gig == \'13\'" style="background-color: ghostwhite;\n                                            width: 33px;\n                                            padding: 5px;\n                                            margin-bottom: 5px;\n                                            border: 3px solid black;" > \n                                        \n                                             \n                                                    \n                                                    13\n                                                    \n                                                  </button>\n\n                                            <button  *ngIf="gig != \'13\'" (click)="setNum(13)" style="background-color: ghostwhite;\n                                            width: 33px;\n                                            padding: 5px;\n                                            margin-bottom: 5px;\n                                            border: 2px solid ghostwhite;\n                                            " > \n                                        \n                                             \n                                                    \n                                                    13\n                                                    \n                                                  </button>\n                                      </div>\n                                    </ion-col>\n                                    <ion-col size="3" offset="3">\n                                      <div>\n\n                                            <button *ngIf="gig == \'14\'" style="background-color: ghostwhite;\n                                            width: 33px;\n                                            padding: 5px;\n                                            margin-bottom: 5px;\n                                            border: 3px solid black;" > \n                                        \n                                             \n                                                    \n                                                    14\n                                                    \n                                                  </button>\n\n                                            <button  *ngIf="gig != \'14\'" (click)="setNum(14)" style="background-color: ghostwhite;\n                                            width: 33px;\n                                            padding: 5px;\n                                            margin-bottom: 5px;\n                                            border: 2px solid ghostwhite;\n                                            " > \n                                        \n                                             \n                                                    \n                                                   14\n                                                    \n                                                  </button>\n                                      </div>\n                                    </ion-col>\n                                  </ion-row>\n                              </div>\n                            </ion-col>\n                            <ion-col style="    margin-top: 5px;">\n                              <div>\n                                <ion-row>\n                                    <ion-col size="3">\n                                      <div>\n\n                                            <button *ngIf="gig == \'15\'" style="background-color: ghostwhite;\n                                            width: 33px;\n                                            padding: 5px;\n                                            margin-bottom: 5px;\n                                            border: 3px solid black;" > \n                                        \n                                             \n                                                    \n                                                    15\n                                                    \n                                                  </button>\n\n                                            <button  *ngIf="gig != \'15\'" (click)="setNum(15)" style="background-color: ghostwhite;\n                                            width: 33px;\n                                            padding: 5px;\n                                            margin-bottom: 5px;\n                                            border: 2px solid ghostwhite;\n                                            " > \n                                             \n                                                    \n                                                    15\n                                                    \n                                                  </button>\n                                      </div>\n                                    </ion-col>\n                                    <ion-col size="3" offset="3">\n                                      <div>\n\n                                            <button *ngIf="gig == \'16\'" style="background-color: ghostwhite;\n                                            width: 33px;\n                                            padding: 5px;\n                                            margin-bottom: 5px;\n                                            border: 3px solid black;" > \n                                        \n                                             \n                                                    \n                                                    16\n                                                    \n                                                  </button>\n\n                                            <button  *ngIf="gig != \'16\'" (click)="setNum(16)" style="background-color: ghostwhite;\n                                            width: 33px;\n                                            padding: 5px;\n                                            margin-bottom: 5px;\n                                            border: 2px solid ghostwhite;\n                                            " > \n                                        \n                                             \n                                                    \n                                                    16\n                                                    \n                                                  </button>\n                                      </div>\n                                    </ion-col>\n                                  </ion-row>\n                              </div>\n                            </ion-col>\n                          </ion-row> <!--tyt-->\n\n\n                          \n                      <ion-row style="background-color: #008000">\n                            <ion-col  style="    margin-top: 5px;">\n                              <div>\n                                <ion-row>\n                                    <ion-col size="3">\n                                      <div>\n\n                                            <button *ngIf="gig == \'17\'"  style="background-color: ghostwhite;\n                                            width: 33px;\n                                            padding: 5px;\n                                            margin-bottom: 5px;\n                                            border: 3px solid black;" > \n                                        \n                                             \n                                                    \n                                                    17\n                                                    \n                                                  </button>\n\n\n                                            <button *ngIf="gig != \'17\'" (click)="setNum(17)" style="background-color: ghostwhite;\n                                            width: 33px;\n                                            padding: 5px;\n                                            margin-bottom: 5px;\n                                            border: 2px solid ghostwhite;" > \n                                        \n                                             \n                                                    \n                                                    17\n                                                    \n                                                  </button>\n                                      </div>\n                                    </ion-col>\n                                    <ion-col size="3" offset="3">\n                                      <div>\n\n                                            <button *ngIf="gig == \'18\'" style="background-color: ghostwhite;\n                                            width: 33px;\n                                            padding: 5px;\n                                            margin-bottom: 5px;\n                                            border: 3px solid black;" > \n                                        \n                                             \n                                                    \n                                                    18\n                                                    \n                                                  </button>\n\n                                            <button  *ngIf="gig != \'18\'" (click)="setNum(18)" style="background-color: ghostwhite;\n                                            width: 33px;\n                                            padding: 5px;\n                                            margin-bottom: 5px;\n                                            border: 2px solid ghostwhite;\n                                            " > \n                                        \n                                             \n                                                    \n                                                    18\n                                                    \n                                                  </button>\n                                      </div>\n                                    </ion-col>\n                                  </ion-row>\n                              </div>\n                            </ion-col>\n                            <ion-col style="    margin-top: 5px;">\n                              <div>\n                                <ion-row>\n                                    <ion-col size="3">\n                                      <div>\n\n                                            <button *ngIf="gig == \'19\'" style="background-color: ghostwhite;\n                                            width: 33px;\n                                            padding: 5px;\n                                            margin-bottom: 5px;\n                                            border: 3px solid black;" > \n                                        \n                                             \n                                                    \n                                                    19\n                                                    \n                                                  </button>\n\n                                            <button *ngIf="gig != \'19\'" (click)="setNum(19)"  style="background-color: ghostwhite;\n                                            width: 33px;\n                                            padding: 5px;\n                                            margin-bottom: 5px;\n                                            border: 2px solid ghostwhite;\n                                            " > \n                                        \n                                             \n                                                    \n                                                    19\n                                                    \n                                                  </button>\n                                      </div>\n                                    </ion-col>\n                                    <ion-col size="3" offset="3">\n                                      <div>\n\n                                            <button *ngIf="gig == \'20\'" style="background-color: ghostwhite;\n                                            width: 33px;\n                                            padding: 5px;\n                                            margin-bottom: 5px;\n                                            border: 3px solid black;" > \n                                        \n                                             \n                                                    \n                                                    20\n                                                    \n                                                  </button>\n\n                                            <button  *ngIf="gig != \'20\'"  (click)="setNum(20)" style="background-color: ghostwhite;\n                                            width: 33px;\n                                            padding: 5px;\n                                            margin-bottom: 5px;\n                                            border: 2px solid ghostwhite;\n                                            " > \n                                        \n                                             \n                                                    \n                                                    20\n                                                    \n                                                  </button>\n                                      </div>\n                                    </ion-col>\n                                  </ion-row>\n                              </div>\n                            </ion-col>\n                            <ion-col size="auto" style="    margin-top: 5px;">\n                              <div>\n                                <ion-row>\n                                    <ion-col size="3">\n                                      <div>\n                                            <button  style="background-color: ghostwhite;\n                                            width: 33px;\n                                            padding: 5px;\n                                            margin-bottom: 5px;\n                                            border: 2px solid ghostwhite;\n                                            visibility: hidden;\n                                            " > \n                                        \n                                             \n                                                    \n                                                    13\n                                                    \n                                                  </button>\n                                      </div>\n                                    </ion-col>\n                                    <ion-col size="3" offset="3">\n                                      <div>\n                                            <button  style="background-color: ghostwhite;\n                                            width: 33px;\n                                            padding: 5px;\n                                            margin-bottom: 5px;\n                                            border: 2px solid ghostwhite;\n                                            visibility: hidden;\n                                            " > \n                                        \n                                             \n                                                    \n                                                   14\n                                                    \n                                                  </button>\n                                      </div>\n                                    </ion-col>\n                                  </ion-row>\n                              </div>\n                            </ion-col>\n                            <ion-col style="    margin-top: 5px;">\n                              <div>\n                                <ion-row>\n                                    <ion-col size="3">\n                                      <div>\n                                            <button  style="background-color: ghostwhite;\n                                            width: 33px;\n                                            padding: 5px;\n                                            margin-bottom: 5px;\n                                            border: 2px solid ghostwhite;\n                                            visibility: hidden;\n                                            " > \n                                             \n                                                    \n                                                    15\n                                                    \n                                                  </button>\n                                      </div>\n                                    </ion-col>\n                                    <ion-col size="3" offset="3">\n                                      <div>\n                                            <button  style="background-color: ghostwhite;\n                                            width: 33px;\n                                            padding: 5px;\n                                            margin-bottom: 5px;\n                                            border: 2px solid ghostwhite;\n                                            visibility: hidden;\n                                            " > \n                                        \n                                             \n                                                    \n                                                    16\n                                                    \n                                                  </button>\n                                      </div>\n                                    </ion-col>\n                                  </ion-row>\n                              </div>\n                            </ion-col>\n                          </ion-row> <!--tyt-->\n                   \n                  </ion-grid>\n      \n      \n              </ion-footer>\n            \n      \n          </ion-list >\n      \n          <style>\n          \n          .card-content-ios {\n           padding: 0px;\n          font-size: 1.4rem;\n          line-height: 1.4;\n      }\n      \n      #over img {\n          margin-left: auto;\n          margin-right: auto;\n          display: block;\n      }\n      \n          </style>\n      \n      </ion-content>\n      '/*ion-inline-end:"F:\AppVilo\ALL_PROJECT\Juliia projects\Teory\mobile\MentorCard\src\pages\mock-test\mock-test.html"*/,
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1_ionic_angular__["i" /* NavController */], __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["j" /* NavParams */],
            __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["a" /* AlertController */]])
    ], MockTestPage);
    return MockTestPage;
}());

//# sourceMappingURL=mock-test.js.map

/***/ }),

/***/ 171:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return QuestionTablePage; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_ionic_angular__ = __webpack_require__(12);
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};


/**
 * Generated class for the QuestionTablePage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */
var QuestionTablePage = /** @class */ (function () {
    function QuestionTablePage(navCtrl, navParams, alertCtrl) {
        this.navCtrl = navCtrl;
        this.navParams = navParams;
        this.alertCtrl = alertCtrl;
    }
    QuestionTablePage.prototype.ionViewDidLoad = function () {
        console.log('ionViewDidLoad QuestionTablePage');
    };
    QuestionTablePage.prototype.open = function () {
        var _this = this;
        var alert = this.alertCtrl.create();
        alert.setTitle('Which planets have you visited?');
        alert.addInput({
            type: 'checkbox',
            label: 'True answers',
            value: 'value1',
            checked: true
        });
        alert.addInput({
            type: 'checkbox',
            label: 'False answers',
            value: 'value2'
        });
        alert.addInput({
            type: 'checkbox',
            label: 'Not answers',
            value: 'value3'
        });
        alert.addButton('Cancel');
        alert.addButton({
            text: 'Okay',
            handler: function (data) {
                console.log('Checkbox data:', data);
                _this.presentError();
            }
        });
        alert.present();
    };
    QuestionTablePage.prototype.presentError = function () {
        var alert = this.alertCtrl.create({
            title: 'Sorry',
            subTitle: 'This is Demo version',
            buttons: ['Ok']
        });
        alert.present();
    };
    QuestionTablePage = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["m" /* Component */])({
            selector: 'page-question-table',template:/*ion-inline-start:"F:\AppVilo\ALL_PROJECT\Juliia projects\Teory\mobile\MentorCard\src\pages\question-table\question-table.html"*/'<!--\n  Generated template for the ChaptersPage page.\n\n  See http://ionicframework.com/docs/components/#navigation for more info on\n  Ionic pages and navigation.\n-->\n<ion-header>\n\n    <ion-navbar>\n        <button ion-button menuToggle>\n            <ion-icon name="menu"></ion-icon>\n          </button>\n      <ion-title>Question Table</ion-title>\n\n      <ion-buttons end>\n          <button ion-button icon-only (click)="open()">\n              <ion-icon name="funnel"></ion-icon>\n          </button>\n        </ion-buttons>\n    </ion-navbar>\n  \n  </ion-header>\n  \n  \n  <ion-content >\n  \n      <ion-card >\n  \n          <ion-card-header class="title_class">\n              Question Table\n            </ion-card-header>\n  \n          <ion-card-content>\n            <p>Username: reseller</p>\n            <p>Category:</p><ion-badge item-end>B-Cars</ion-badge>\n          </ion-card-content>\n            </ion-card>\n  \n  \n            <ion-card>\n                <ion-card-header class="title_class">\n                    Questions knowledge\n                </ion-card-header>\n              \n                <ion-list>\n                  <button ion-item (click)="presentError()">\n                      <ion-icon name="radio-button-off"></ion-icon>\n                      <ion-icon name="radio-button-off"></ion-icon>\n                      1.7.01-001\n                    <p>Sie haben an Ihrer Zugmaschine einen weit nach hinten<br>\n                       hinausragenden Heuwender angebaut. Wer kann dadurch beim<br>\n                        Linksabbiegen gef?hrdet werden? - Points:4- B</p>\n                  </button>\n\n\n                  <button ion-item (click)="presentError()">\n                      <ion-icon name="radio-button-off"></ion-icon>\n                      <ion-icon name="radio-button-off"></ion-icon>\n                      1.7.01-002\n                    <p>Sie haben an Ihrer Zugmaschine einen weit nach hinten<br>\n                       hinausragenden Heuwender angebaut. Wer kann dadurch beim<br>\n                        Linksabbiegen gef?hrdet werden? - Points:4- B</p>\n                  </button>\n\n\n                  <button ion-item (click)="presentError()">\n                      <ion-icon name="radio-button-off"></ion-icon>\n                      <ion-icon name="radio-button-off"></ion-icon>\n                      1.7.01-003\n                    <p>Sie haben an Ihrer Zugmaschine einen weit nach hinten<br>\n                       hinausragenden Heuwender angebaut. Wer kann dadurch beim<br>\n                        Linksabbiegen gef?hrdet werden? - Points:4- B</p>\n                  </button>\n              \n\n                  <button ion-item (click)="presentError()">\n                      <ion-icon name="radio-button-off"></ion-icon>\n                      <ion-icon name="radio-button-off"></ion-icon>\n                      1.7.01-004\n                    <p>Sie haben an Ihrer Zugmaschine einen weit nach hinten<br>\n                       hinausragenden Heuwender angebaut. Wer kann dadurch beim<br>\n                        Linksabbiegen gef?hrdet werden? - Points:4- B</p>\n                  </button>\n              \n\n                  <button ion-item (click)="presentError()">\n                      <ion-icon name="radio-button-off"></ion-icon>\n                      <ion-icon name="radio-button-off"></ion-icon>\n                      1.7.01-005\n                    <p>Sie haben an Ihrer Zugmaschine einen weit nach hinten<br>\n                       hinausragenden Heuwender angebaut. Wer kann dadurch beim<br>\n                        Linksabbiegen gef?hrdet werden? - Points:4- B</p>\n                  </button>\n              \n\n                  <button ion-item (click)="presentError()">\n                      <ion-icon name="radio-button-off"></ion-icon>\n                      <ion-icon name="radio-button-off"></ion-icon>\n                      1.7.01-006\n                    <p>Sie haben an Ihrer Zugmaschine einen weit nach hinten<br>\n                       hinausragenden Heuwender angebaut. Wer kann dadurch beim<br>\n                        Linksabbiegen gef?hrdet werden? - Points:4- B</p>\n                  </button>\n\n\n                  <button ion-item (click)="presentError()">\n                      <ion-icon name="radio-button-off"></ion-icon>\n                      <ion-icon name="radio-button-off"></ion-icon>\n                      1.7.01-007\n                    <p>Sie haben an Ihrer Zugmaschine einen weit nach hinten<br>\n                       hinausragenden Heuwender angebaut. Wer kann dadurch beim<br>\n                        Linksabbiegen gef?hrdet werden? - Points:4- B</p>\n                  </button>\n              \n              \n\n                  <button ion-item (click)="presentError()">\n                      <ion-icon name="radio-button-off"></ion-icon>\n                      <ion-icon name="radio-button-off"></ion-icon>\n                      1.7.01-008\n                    <p>Sie haben an Ihrer Zugmaschine einen weit nach hinten<br>\n                       hinausragenden Heuwender angebaut. Wer kann dadurch beim<br>\n                        Linksabbiegen gef?hrdet werden? - Points:4- B</p>\n                  </button>\n              \n\n                  <button ion-item (click)="presentError()">\n                      <ion-icon name="radio-button-off"></ion-icon>\n                      <ion-icon name="radio-button-off"></ion-icon>\n                      1.7.01-009\n                    <p>Sie haben an Ihrer Zugmaschine einen weit nach hinten<br>\n                       hinausragenden Heuwender angebaut. Wer kann dadurch beim<br>\n                        Linksabbiegen gef?hrdet werden? - Points:4- B</p>\n                  </button>\n              \n\n                  <button ion-item (click)="presentError()">\n                      <ion-icon name="radio-button-off"></ion-icon>\n                      <ion-icon name="radio-button-off"></ion-icon>\n                      1.7.01-0010 \n                    <p>Sie haben an Ihrer Zugmaschine einen weit nach hinten<br>\n                       hinausragenden Heuwender angebaut. Wer kann dadurch beim<br>\n                        Linksabbiegen gef?hrdet werden? - Points:4- B</p>\n                  </button>\n              \n              \n                </ion-list>\n              </ion-card>\n  \n  </ion-content>\n  '/*ion-inline-end:"F:\AppVilo\ALL_PROJECT\Juliia projects\Teory\mobile\MentorCard\src\pages\question-table\question-table.html"*/,
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1_ionic_angular__["i" /* NavController */], __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["j" /* NavParams */], __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["a" /* AlertController */]])
    ], QuestionTablePage);
    return QuestionTablePage;
}());

//# sourceMappingURL=question-table.js.map

/***/ }),

/***/ 172:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return ShopPage; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_ionic_angular__ = __webpack_require__(12);
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};




/**
 * Generated class for the ShopPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */
var ShopPage = /** @class */ (function () {
    function ShopPage(navCtrl, navParams, alertCtrl) {
        this.navCtrl = navCtrl;
        this.navParams = navParams;
        this.alertCtrl = alertCtrl;
    }
    ShopPage.prototype.ionViewDidLoad = function () {
        console.log('ionViewDidLoad ShopPage');
    };
    ShopPage.prototype.next = function () {
        this.slides.slideNext();
    };
    ShopPage.prototype.prev = function () {
        this.slides.slidePrev();
    };
    ShopPage.prototype.presentError = function () {
        var alert = this.alertCtrl.create({
            title: 'Sorry',
            subTitle: 'This is Demo version',
            buttons: ['Ok']
        });
        alert.present();
    };
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_8" /* ViewChild */])('slides'),
        __metadata("design:type", __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["l" /* Slides */])
    ], ShopPage.prototype, "slides", void 0);
    ShopPage = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["m" /* Component */])({
            selector: 'page-shop',template:/*ion-inline-start:"F:\AppVilo\ALL_PROJECT\Juliia projects\Teory\mobile\MentorCard\src\pages\shop\shop.html"*/'<!--\n  Generated template for the ShopPage page.\n\n  See http://ionicframework.com/docs/components/#navigation for more info on\n  Ionic pages and navigation.\n-->\n<ion-header>\n\n  <ion-navbar>\n      <button ion-button menuToggle>\n          <ion-icon name="menu"></ion-icon>\n        </button>\n    <ion-title>Shop</ion-title>\n  </ion-navbar>\n\n</ion-header>\n\n\n<ion-content >\n    <ion-grid>\n        <ion-row>\n          <ion-col>\n              <button ion-button full color="light" (click)="prev()">Order</button>\n          </ion-col>\n          <ion-col>\n              <button ion-button full  (click)="next()">Code List</button>\n          </ion-col>\n        </ion-row>\n        \n      </ion-grid>\n\n      <ion-list >\n\n          <ion-slides #slides>\n              <ion-slide>\n\n    <ion-card>\n\n        <ion-item>\n          \n          <h2 class="title_class">Order</h2>\n          \n        </ion-item>\n      \n      \n        <ion-card-content>\n            <ion-item>\n                <ion-label>Mentorcard 6,99 €</ion-label>\n                <ion-select [(ngModel)]="mentorcard">\n                  <ion-option value="0">0</ion-option>\n                  <ion-option value="10">10</ion-option>\n                  <ion-option value="20">20</ion-option>\n                  <ion-option value="30">30</ion-option>\n                  <ion-option value="40">40</ion-option>\n                  <ion-option value="50">50</ion-option>\n                  <ion-option value="60">60</ion-option>\n                  <ion-option value="70">70</ion-option>\n                  <ion-option value="80">80</ion-option>\n                  <ion-option value="90">90</ion-option>\n                  <ion-option value="100">100</ion-option>\n                </ion-select>\n              </ion-item>\n\n\n\n        </ion-card-content>\n\n        <ion-card-header class="title_class">\n           \nInvoice & Shipping\n          </ion-card-header>\n      \n          <ion-item>\n              <ion-icon name="mail" ></ion-icon>\n              <ion-label>\n                <p>Rechnungsadresse</p>\n                <h2>reseller</h2>\n                <h2>test</h2>\n                <h2>123321 kaha</h2>\n              </ion-label>\n            </ion-item>\n\n            <ion-item>\n                <ion-icon name="mail" ></ion-icon>\n                <ion-label>\n                  <p>Lieferadresse</p>\n                  <h2>reseller</h2>\n                  <h2>test</h2>\n                  <h2>123321 kaha</h2>\n                </ion-label>\n              </ion-item>\n      \n      </ion-card>\n\n      <ion-card>\n          <ion-card-header class="title_class">\n              Order summary\n          </ion-card-header>\n          <ion-card-content>\n              <ion-grid>\n                  <ion-row>\n                    <ion-col>\n                      <div>Invoice amount</div>\n                    </ion-col>\n                    <ion-col>\n                      <div>0.0 €</div>\n                    </ion-col>\n                  </ion-row>\n                  <ion-row>\n                      <ion-col>\n                        <div>+ 19% VAT</div>\n                      </ion-col>\n                      <ion-col>\n                        <div>0.0 €</div>\n                      </ion-col>\n                    </ion-row>\n                </ion-grid>\n<ion-item>\n                <ion-icon name="mail" ></ion-icon>\n                <ion-label>\n                  <p>Invoice amount:</p>\n                  <h2>0.0 €</h2>\n                 \n                </ion-label>\n              </ion-item>\n              <button ion-button full (click)="presentError()">Buy Now</button>\n          </ion-card-content>\n        </ion-card>\n\n      </ion-slide>\n\n\n      <ion-slide>\n          <div class="title_class">\n              Code List\n          </div>\n\n          <ion-card>\n\n              <ion-item>\n                <ion-avatar item-start>\n                  <img src="assets/imgs/power.png">\n                </ion-avatar>\n                <h2>gzChCc</h2>\n                <p>fahrschulementor@gmail.com</p>\n              </ion-item>\n            \n            \n              \n            \n            </ion-card>\n            <ion-card>\n\n                <ion-item>\n                  <ion-avatar item-start>\n                    <img src="assets/imgs/power.png">\n                  </ion-avatar>\n                  <h2>IxfbVn</h2>\n                  <p>student1@protonmail.com</p>\n                </ion-item>\n              \n              \n                \n              \n              </ion-card>\n              <ion-card>\n\n                  <ion-item>\n                    <ion-avatar item-start>\n                      <img src="assets/imgs/power-button.png">\n                    </ion-avatar>\n                    <h2>DjbbQ5</h2>\n                    <p style="color: firebrick">(not set)</p>\n                  </ion-item>\n                \n                \n                  \n                \n                </ion-card>\n\n        </ion-slide>\n        \n      </ion-slides>\n\n\n    \n  </ion-list >\n\n</ion-content>\n'/*ion-inline-end:"F:\AppVilo\ALL_PROJECT\Juliia projects\Teory\mobile\MentorCard\src\pages\shop\shop.html"*/,
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1_ionic_angular__["i" /* NavController */], __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["j" /* NavParams */], __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["a" /* AlertController */]])
    ], ShopPage);
    return ShopPage;
}());

//# sourceMappingURL=shop.js.map

/***/ }),

/***/ 173:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return StatisticsPage; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_ionic_angular__ = __webpack_require__(12);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_chart_js__ = __webpack_require__(819);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_chart_js___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_2_chart_js__);
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};



/**
 * Generated class for the StatisticsPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */
var StatisticsPage = /** @class */ (function () {
    function StatisticsPage(navCtrl, navParams) {
        this.navCtrl = navCtrl;
        this.navParams = navParams;
    }
    StatisticsPage.prototype.ionViewDidLoad = function () {
        this.doughnutChart = new __WEBPACK_IMPORTED_MODULE_2_chart_js__["Chart"](this.doughnutCanvas.nativeElement, {
            type: 'doughnut',
            data: {
                labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                datasets: [{
                        label: '# of Votes',
                        data: [12, 19, 3, 5, 2, 3],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        hoverBackgroundColor: [
                            "#FF6384",
                            "#36A2EB",
                            "#FFCE56",
                            "#FF6384",
                            "#36A2EB",
                            "#FFCE56"
                        ]
                    }]
            }
        });
        this.lineChart = new __WEBPACK_IMPORTED_MODULE_2_chart_js__["Chart"](this.lineCanvas.nativeElement, {
            type: 'line',
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [
                    {
                        label: "My First dataset",
                        fill: false,
                        lineTension: 0.1,
                        backgroundColor: "rgba(75,192,192,0.4)",
                        borderColor: "rgba(75,192,192,1)",
                        borderCapStyle: 'butt',
                        borderDash: [],
                        borderDashOffset: 0.0,
                        borderJoinStyle: 'miter',
                        pointBorderColor: "rgba(75,192,192,1)",
                        pointBackgroundColor: "#fff",
                        pointBorderWidth: 1,
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: "rgba(75,192,192,1)",
                        pointHoverBorderColor: "rgba(220,220,220,1)",
                        pointHoverBorderWidth: 2,
                        pointRadius: 1,
                        pointHitRadius: 10,
                        data: [65, 59, 80, 81, 56, 55, 40],
                        spanGaps: false,
                    }
                ]
            }
        });
    };
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_8" /* ViewChild */])('barCanvas'),
        __metadata("design:type", Object)
    ], StatisticsPage.prototype, "barCanvas", void 0);
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_8" /* ViewChild */])('doughnutCanvas'),
        __metadata("design:type", Object)
    ], StatisticsPage.prototype, "doughnutCanvas", void 0);
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_8" /* ViewChild */])('lineCanvas'),
        __metadata("design:type", Object)
    ], StatisticsPage.prototype, "lineCanvas", void 0);
    StatisticsPage = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["m" /* Component */])({
            selector: 'page-statistics',template:/*ion-inline-start:"F:\AppVilo\ALL_PROJECT\Juliia projects\Teory\mobile\MentorCard\src\pages\statistics\statistics.html"*/'<!--\n  Generated template for the StatisticsPage page.\n\n  See http://ionicframework.com/docs/components/#navigation for more info on\n  Ionic pages and navigation.\n-->\n<ion-header>\n\n  <ion-navbar>\n      <button ion-button menuToggle>\n          <ion-icon name="menu"></ion-icon>\n        </button>\n    <ion-title>Statistics</ion-title>\n  </ion-navbar>\n\n</ion-header>\n\n\n<ion-content >\n\n    <ion-card  >\n        <ion-item class= "first">\n          <ion-avatar item-start>\n              <img src="assets/imgs/close.png">\n          </ion-avatar>\n          <h2 class="text-wt">PRACTICE SHEETS</h2>\n          <h3 class="text-wt">0% made</h3>\n          <p class="text-wt">November 5, 1955</p>\n        </ion-item>\n      </ion-card>\n    \n      <ion-card >\n        <ion-item class= "second">\n          <ion-avatar item-start>\n              <img src="assets/imgs/check-mark.png">\n          </ion-avatar>\n          <h2 class="text-wt">MOCK TEST</h2>\n          <h3 class="text-wt">0 of 920 done</h3>\n          <p class="text-wt">November 5, 1955</p>\n        </ion-item>\n      </ion-card>\n\n\n\n      <ion-card >\n\n          <ion-card-header class="title_class">\n              Study Progress\n            </ion-card-header>\n\n            <ion-item>\n    \n                <ion-icon name="checkmark" item-start large></ion-icon>\n                <h2>CORRECT ANSWERS</h2>\n                <p>0 questions</p>\n              </ion-item>\n       \n              <ion-item>\n\n                  <ion-icon name="close" item-start large></ion-icon>\n                  <h2>\n                      WRONG ANSWERS</h2>\n                  <p>0 questions</p>\n                </ion-item>\n\n                <ion-item>\n                    <ion-icon name="help" item-start large></ion-icon>\n                    <h2>NO QUESTIONS ANSWERED</h2>\n                    <p>920 questions</p>\n                  </ion-item>\n    \n    \n          </ion-card>\n\n         \n            <ion-card>\n              <ion-card-header>\n                Doughnut Chart\n              </ion-card-header>\n              <ion-card-content>\n                <canvas #doughnutCanvas></canvas>\n              </ion-card-content>\n            </ion-card>\n         \n            <ion-card>\n              <ion-card-header>\n                Line Chart\n              </ion-card-header>\n              <ion-card-content>\n                <canvas #lineCanvas></canvas>\n              </ion-card-content>\n            </ion-card>\n\n          \n</ion-content>\n'/*ion-inline-end:"F:\AppVilo\ALL_PROJECT\Juliia projects\Teory\mobile\MentorCard\src\pages\statistics\statistics.html"*/,
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1_ionic_angular__["i" /* NavController */], __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["j" /* NavParams */]])
    ], StatisticsPage);
    return StatisticsPage;
}());

//# sourceMappingURL=statistics.js.map

/***/ }),

/***/ 174:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return StudentsPage; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_ionic_angular__ = __webpack_require__(12);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__angular_common_http__ = __webpack_require__(64);
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};



/**
 * Generated class for the StudentsPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */
var StudentsPage = /** @class */ (function () {
    function StudentsPage(navCtrl, navParams, alertCtrl, http) {
        this.navCtrl = navCtrl;
        this.navParams = navParams;
        this.alertCtrl = alertCtrl;
        this.http = http;
        this.url = "http://www.mentorcard.de/api/get_students_from_school.php?id=4";
        this.getData();
    }
    StudentsPage.prototype.getData = function () {
        var _this = this;
        this.data = this.http.get(this.url);
        this.data.subscribe(function (data) {
            _this.items = data;
        });
    };
    StudentsPage.prototype.ionViewDidLoad = function () {
        console.log('ionViewDidLoad StudentsPage');
    };
    StudentsPage.prototype.presentError = function () {
        var alert = this.alertCtrl.create({
            title: 'Sorry',
            subTitle: 'This is Demo version',
            buttons: ['Ok']
        });
        alert.present();
    };
    StudentsPage = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["m" /* Component */])({
            selector: 'page-students',template:/*ion-inline-start:"F:\AppVilo\ALL_PROJECT\Juliia projects\Teory\mobile\MentorCard\src\pages\students\students.html"*/'<!--\n  Generated template for the StudentsPage page.\n\n  See http://ionicframework.com/docs/components/#navigation for more info on\n  Ionic pages and navigation.\n-->\n<ion-header>\n\n  <ion-navbar>\n      <button ion-button menuToggle>\n          <ion-icon name="menu"></ion-icon>\n        </button>\n    <ion-title>Students</ion-title>\n  </ion-navbar>\n\n</ion-header>\n\n\n<ion-content >\n\n\n  <ion-list>\n  \n    <ion-col *ngFor="let item of items"  no-padding>\n\n    <ion-card>\n\n        <ion-item (click)="presentError()">\n          <h2>{{item.first_name}} {{item.last_name}}</h2>\n          <p>{{item.activation_code}}</p>\n          <p>{{item.email}}</p>\n        </ion-item>\n\n        </ion-card>\n\n      </ion-col>\n\n      </ion-list>\n                \n                 \n                           \n</ion-content>\n\n\n'/*ion-inline-end:"F:\AppVilo\ALL_PROJECT\Juliia projects\Teory\mobile\MentorCard\src\pages\students\students.html"*/,
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1_ionic_angular__["i" /* NavController */], __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["j" /* NavParams */], __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["a" /* AlertController */], __WEBPACK_IMPORTED_MODULE_2__angular_common_http__["a" /* HttpClient */]])
    ], StudentsPage);
    return StudentsPage;
}());

//# sourceMappingURL=students.js.map

/***/ }),

/***/ 175:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return SystemPage; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_ionic_angular__ = __webpack_require__(12);
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};



/**
 * Generated class for the SystemPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */
var SystemPage = /** @class */ (function () {
    function SystemPage(navCtrl, navParams, alertCtrl) {
        this.navCtrl = navCtrl;
        this.navParams = navParams;
        this.alertCtrl = alertCtrl;
    }
    SystemPage.prototype.ionViewDidLoad = function () {
        console.log('ionViewDidLoad SystemPage');
    };
    SystemPage.prototype.showAlert = function () {
        var alert = this.alertCtrl.create({
            title: 'Tip!',
            subTitle: 'MentorLimited automatically synchronizes your data with the cloud. This gives you access to the same records from any device. Here you have the possibility to synchronize your data manuality with the cloud.  The last synchronization look place on 08/29/2018 03:58:11 pm',
            buttons: ['OK']
        });
        alert.present();
    };
    SystemPage.prototype.presentError = function () {
        var alert = this.alertCtrl.create({
            title: 'Sorry',
            subTitle: 'This is Demo version',
            buttons: ['Ok']
        });
        alert.present();
    };
    SystemPage = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["m" /* Component */])({
            selector: 'page-system',template:/*ion-inline-start:"F:\AppVilo\ALL_PROJECT\Juliia projects\Teory\mobile\MentorCard\src\pages\system\system.html"*/'<!--\n  Generated template for the SystemPage page.\n\n  See http://ionicframework.com/docs/components/#navigation for more info on\n  Ionic pages and navigation.\n-->\n<ion-header>\n\n  <ion-navbar>\n      <button ion-button menuToggle>\n          <ion-icon name="menu"></ion-icon>\n        </button>\n    <ion-title>System</ion-title>\n    <ion-buttons end>\n        <button ion-button icon-only (click)="showAlert()">\n            <ion-icon name="alert"></ion-icon>\n        </button>\n      </ion-buttons>\n  </ion-navbar>\n\n</ion-header>\n\n\n<ion-content >\n\n    <ion-card>\n\n        <ion-item>\n          \n          <h2 class="title_class">SYNCHRONIZATION</h2>\n          \n        </ion-item>\n\n        <ion-item>\n            <ion-icon name="mail" ></ion-icon>\n            <ion-label>\n              <p>The following records are synchronized:</p>\n              <h2>- questions:0</h2>\n              <br>\n              <button ion-button full (click)="presentError()">Sync data now</button>\n            </ion-label>\n            \n          </ion-item>\n\n          <ion-item>\n              <ion-icon name="mail" ></ion-icon>\n              <ion-label>\n                <p>The following records are delete:</p>\n                <h2>Study progress</h2>\n                <h2>Review status</h2>\n                <h2>question status</h2>\n                <h2>questionnaires</h2>\n                <br>\n                <button ion-button color="danger" (click)="presentError()" full>Delete all statistics</button>\n              </ion-label>\n              \n            </ion-item>\n\n\n                      </ion-card>\n\n                      <ion-card>\n\n                          <ion-item>\n                            \n                            <h2 class="title_class">App Information</h2>\n                            \n                          </ion-item>\n                  \n                          <ion-item>\n                              <ion-icon name="mail" ></ion-icon>\n                              <ion-label>\n                                <p>Version</p>\n                                <h2>v1.0</h2>\n                                <h2>Status: online</h2>\n                                <h2>UserId: 4</h2>\n                                <h2>UserEmail:</h2>\n                                \n                              </ion-label>\n                             \n                            </ion-item>\n                  \n                            <ion-item>\n                                <ion-icon name="mail" ></ion-icon>\n                                <ion-label>\n                                  <p>User Agent</p>\n                                  <h2>iOS or Android (Version 6.5.1) etc.</h2>\n                                  \n                                </ion-label>\n                                \n                              </ion-item>\n\n                              <ion-item>\n                                  <ion-icon name="mail" ></ion-icon>\n                                  <ion-label>\n                                    <p>Api Version</p>\n                                    <h2>v1.0</h2>\n                                    \n                                  </ion-label>\n                                  \n                                </ion-item>\n                  \n                  \n                                        </ion-card>\n\n                      \n\n</ion-content>\n'/*ion-inline-end:"F:\AppVilo\ALL_PROJECT\Juliia projects\Teory\mobile\MentorCard\src\pages\system\system.html"*/,
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1_ionic_angular__["i" /* NavController */], __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["j" /* NavParams */], __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["a" /* AlertController */]])
    ], SystemPage);
    return SystemPage;
}());

//# sourceMappingURL=system.js.map

/***/ }),

/***/ 176:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return UserProfilePage; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_ionic_angular__ = __webpack_require__(12);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__angular_common_http__ = __webpack_require__(64);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__providers_database_database__ = __webpack_require__(65);
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};




/**
 * Generated class for the UserProfilePage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */
var UserProfilePage = /** @class */ (function () {
    function UserProfilePage(navCtrl, navParams, alertCtrl, http, databaseProvider) {
        var _this = this;
        this.navCtrl = navCtrl;
        this.navParams = navParams;
        this.alertCtrl = alertCtrl;
        this.http = http;
        this.databaseProvider = databaseProvider;
        this.loginData = { name: '', email: '', surename: '', bithday: '', phone: '',
            home_adress: '', mail_adress: '', password: '', next_level: '' };
        this.devs = [];
        this.dev = {};
        var url = "http://www.mentorcard.de/api/get_info_student.php";
        var postData = new FormData();
        postData.append('id', '25');
        this.data = this.http.post(url, postData);
        this.data.subscribe(function (data) {
            if (data != null) {
                _this.loginData.name = data['first_name'];
                _this.loginData.surename = data['last_name'];
                _this.loginData.password = data['day_birth'];
                _this.loginData.phone = data['place_birth'];
                _this.loginData.home_adress = data['phone_number'];
                _this.loginData.mail_adress = data['email'];
                _this.loginData.next_level = data['place_birth'];
            }
            else {
            }
            console.log(data);
        });
    }
    UserProfilePage.prototype.ionViewDidLoad = function () {
        console.log('ionViewDidLoad UserProfilePage');
    };
    UserProfilePage.prototype.save = function () {
        var alert = this.alertCtrl.create({
            title: 'Sorry',
            subTitle: 'This is Demo version',
            buttons: ['Ok']
        });
        alert.present();
    };
    UserProfilePage = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["m" /* Component */])({
            selector: 'page-user-profile',template:/*ion-inline-start:"F:\AppVilo\ALL_PROJECT\Juliia projects\Teory\mobile\MentorCard\src\pages\user-profile\user-profile.html"*/'\n<ion-header>\n  <ion-navbar>\n    <ion-title>Setting User</ion-title>\n\n  \n  </ion-navbar>\n\n  </ion-header>\n  \n  <ion-content >\n    \n\n    <ion-list >\n       \n      <ion-item>\n        <ion-icon name="ios-person" ></ion-icon>\n       \n        <ion-label  color="primary" stacked>\n          First Name *\n          </ion-label>\n       \n\n          <ion-input type="text" [(ngModel)]="loginData.name"  placeholder="First Name "></ion-input>\n        \n      </ion-item>\n\n\n      <ion-item>\n          <ion-icon name="ios-person" ></ion-icon>\n          <ion-label  color="primary" stacked>\n            Last Name *\n          </ion-label>\n            <ion-input type="text" [(ngModel)]="loginData.surename"  placeholder=" Last Name "></ion-input>\n          \n        </ion-item>\n      \n      <ion-item>\n        <ion-icon name="mail" ></ion-icon>\n        <ion-label  color="primary" stacked>\n          Password *\n        </ion-label>\n          <ion-input type="text" [(ngModel)]="loginData.email"  placeholder=" Password "></ion-input>\n        \n      </ion-item>\n\n      <ion-item>\n          <ion-icon name="password" ></ion-icon>\n          <ion-label  color="primary" stacked>\n            Date of birth *\n          </ion-label>\n            <ion-input type="text" [(ngModel)]="loginData.password" placeholder="Date of birth "></ion-input>\n          \n        </ion-item>\n  \n      <ion-item>\n          <ion-icon name="person" ></ion-icon>\n          <ion-label  color="primary" stacked>\n            Place Birth\n          </ion-label>\n         \n            <ion-input type="text" [(ngModel)]="loginData.phone"  placeholder="Place Birth"></ion-input>\n           \n        </ion-item>\n        <ion-item>\n            <ion-icon name="person" ></ion-icon>\n            <ion-label  color="primary" stacked>\n              Country *\n            </ion-label>\n       \n            <ion-input type="text" [(ngModel)]="loginData.next_level"  placeholder="Place Birth"></ion-input>\n              \n\n          </ion-item>\n          <ion-item>\n              <ion-icon name="person" ></ion-icon>\n              <ion-label   color="primary" stacked>\n                Phone Number\n              </ion-label>\n              \n                <ion-input type="text"  [(ngModel)]="loginData.home_adress" placeholder="Phone Number"></ion-input>\n                \n            </ion-item>\n            <ion-item>\n                <ion-icon name="person" ></ion-icon>\n                <ion-label  color="primary" stacked>\n                  Email\n                </ion-label>\n              \n                  <ion-input type="text"  [(ngModel)]="loginData.mail_adress" placeholder="Email"></ion-input>\n                \n              </ion-item>\n\n              <ion-list>\n                <ion-item padding-right>\n                  <ion-label>Languages</ion-label>\n        <ion-select [(ngModel)]="gender">\n          <ion-option value="f" selected>English</ion-option>\n          <ion-option value="m3">Deutsch</ion-option>\n          <ion-option value="m2">Turk</ion-option>\n          <ion-option value="Italiano">Italiano</ion-option>\n          <ion-option value="Hrvatski">Hrvatski</ion-option>\n          <ion-option value="Español">Español</ion-option>\n          <ion-option value="Français">Français</ion-option>\n          <ion-option value="Português">Português</ion-option>\n          <ion-option value="Polski">Polski</ion-option>\n          <ion-option value="Română">Română</ion-option>\n          <ion-option value="Русский">Русский</ion-option>\n          <ion-option value="Ελληνικά">Ελληνικά</ion-option>\n          <ion-option value="2">हिंदी</ion-option>\n          <ion-option value="m4">ਪੰਜਾਬੀ</ion-option>\n          <ion-option value="m5">中文</ion-option>\n        </ion-select>\n                </ion-item>\n               \n              </ion-list>\n  \n              <button ion-button full (click)="save()">Update</button>\n\n              <ion-item>\n\n              \n            </ion-item>\n  \n    </ion-list>\n  </ion-content>\n  '/*ion-inline-end:"F:\AppVilo\ALL_PROJECT\Juliia projects\Teory\mobile\MentorCard\src\pages\user-profile\user-profile.html"*/,
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1_ionic_angular__["i" /* NavController */], __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["j" /* NavParams */], __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["a" /* AlertController */], __WEBPACK_IMPORTED_MODULE_2__angular_common_http__["a" /* HttpClient */],
            __WEBPACK_IMPORTED_MODULE_3__providers_database_database__["a" /* DatabaseProvider */]])
    ], UserProfilePage);
    return UserProfilePage;
}());

//# sourceMappingURL=user-profile.js.map

/***/ }),

/***/ 187:
/***/ (function(module, exports) {

function webpackEmptyAsyncContext(req) {
	// Here Promise.resolve().then() is used instead of new Promise() to prevent
	// uncatched exception popping up in devtools
	return Promise.resolve().then(function() {
		throw new Error("Cannot find module '" + req + "'.");
	});
}
webpackEmptyAsyncContext.keys = function() { return []; };
webpackEmptyAsyncContext.resolve = webpackEmptyAsyncContext;
module.exports = webpackEmptyAsyncContext;
webpackEmptyAsyncContext.id = 187;

/***/ }),

/***/ 231:
/***/ (function(module, exports, __webpack_require__) {

var map = {
	"../pages/chapters/chapters.module": [
		881,
		14
	],
	"../pages/choose-lang/choose-lang.module": [
		882,
		13
	],
	"../pages/end-test-mock/end-test-mock.module": [
		883,
		12
	],
	"../pages/forgot/forgot.module": [
		884,
		11
	],
	"../pages/login/login.module": [
		885,
		10
	],
	"../pages/mock-test/mock-test.module": [
		887,
		9
	],
	"../pages/practice/practice.module": [
		886,
		8
	],
	"../pages/question-table/question-table.module": [
		888,
		7
	],
	"../pages/register/register.module": [
		889,
		6
	],
	"../pages/shop/shop.module": [
		890,
		5
	],
	"../pages/statistics/statistics.module": [
		891,
		4
	],
	"../pages/students/students.module": [
		892,
		3
	],
	"../pages/system/system.module": [
		893,
		2
	],
	"../pages/user-profile/user-profile.module": [
		894,
		1
	],
	"../pages/user/user.module": [
		895,
		0
	]
};
function webpackAsyncContext(req) {
	var ids = map[req];
	if(!ids)
		return Promise.reject(new Error("Cannot find module '" + req + "'."));
	return __webpack_require__.e(ids[1]).then(function() {
		return __webpack_require__(ids[0]);
	});
};
webpackAsyncContext.keys = function webpackAsyncContextKeys() {
	return Object.keys(map);
};
webpackAsyncContext.id = 231;
module.exports = webpackAsyncContext;

/***/ }),

/***/ 50:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return LoginPage; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_ionic_angular__ = __webpack_require__(12);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__angular_forms__ = __webpack_require__(25);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__forgot_forgot__ = __webpack_require__(167);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__register_register__ = __webpack_require__(168);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_5__dashboard_dashboard__ = __webpack_require__(63);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_6__angular_common_http__ = __webpack_require__(64);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_7__choose_lang_choose_lang__ = __webpack_require__(100);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_8__providers_database_database__ = __webpack_require__(65);
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};









/**
 * Generated class for the LoginPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */
var LoginPage = /** @class */ (function () {
    function LoginPage(navCtrl, loadingCtrl, navParams, fb, alertCtrl, http, databaseProvider) {
        this.navCtrl = navCtrl;
        this.loadingCtrl = loadingCtrl;
        this.navParams = navParams;
        this.fb = fb;
        this.alertCtrl = alertCtrl;
        this.http = http;
        this.databaseProvider = databaseProvider;
        this.loginData = { email: '', password: '' };
        this.devs = [];
        this.dev = {};
        this.authForm = this.fb.group({
            'email': [null, __WEBPACK_IMPORTED_MODULE_2__angular_forms__["f" /* Validators */].compose([__WEBPACK_IMPORTED_MODULE_2__angular_forms__["f" /* Validators */].required])],
            'password': [null, __WEBPACK_IMPORTED_MODULE_2__angular_forms__["f" /* Validators */].compose([__WEBPACK_IMPORTED_MODULE_2__angular_forms__["f" /* Validators */].required])],
        });
        this.email = this.authForm.controls['email'];
        this.password = this.authForm.controls['password'];
    }
    LoginPage.prototype.ionViewDidEnter = function () {
        this.presentLoadingDefault();
        this.loadDev();
    };
    LoginPage.prototype.presentLoadingDefault = function () {
        this.loading = this.loadingCtrl.create({
            content: 'Please wait...'
        });
        this.loading.present();
    };
    LoginPage.prototype.moveToChoose = function () {
        this.navCtrl.setRoot(__WEBPACK_IMPORTED_MODULE_7__choose_lang_choose_lang__["a" /* ChooseLangPage */]);
    };
    LoginPage.prototype.moveToHome = function () {
        var _this = this;
        if (this.loginData.email.length > 0 && this.loginData.password.length > 0) {
            this.presentLoadingDefault();
            var url = "http://www.mentorcard.de/api/login.php";
            var postData = new FormData();
            postData.append('username', this.loginData.email);
            postData.append('password', this.loginData.password);
            this.data = this.http.post(url, postData);
            this.data.subscribe(function (data) {
                _this.loading.dismiss();
                if (data['user']['status'] != null) {
                    _this.loading.dismiss();
                    _this.addUser(data['user']['status'], data['user']['user_id']);
                    // this.postReg();
                }
                else {
                    _this.loading.dismiss();
                }
                console.log(data);
            });
        }
        else {
            this.loading.dismiss();
            this.presentError();
        }
        this.loading.dismiss();
    };
    LoginPage.prototype.loadDev = function () {
        var _this = this;
        this.loading.dismiss();
        this.databaseProvider.getUsers().then(function (data) {
            _this.devs = data;
            if (data[0]['fp_id'] != null) {
                //   alert(JSON.stringify(data));
                _this.navCtrl.setRoot(__WEBPACK_IMPORTED_MODULE_5__dashboard_dashboard__["a" /* DashboardPage */]);
            }
            else {
            }
        }).catch(this.loading.dismiss());
    };
    LoginPage.prototype.addUser = function (fp_id, user_id) {
        var _this = this;
        this.databaseProvider.addDeveloper(fp_id, user_id).then(function (data) {
            _this.loadDev();
            window.location.reload();
            // alert(data);
        });
        this.dev = {};
    };
    LoginPage.prototype.presentError = function () {
        var alert = this.alertCtrl.create({
            title: 'Error',
            subTitle: 'Field is empty',
            buttons: ['Ok']
        });
        alert.present();
    };
    LoginPage.prototype.moveToForgot = function () {
        this.navCtrl.setRoot(__WEBPACK_IMPORTED_MODULE_3__forgot_forgot__["a" /* ForgotPage */]);
    };
    LoginPage.prototype.moveToReg = function () {
        this.navCtrl.setRoot(__WEBPACK_IMPORTED_MODULE_4__register_register__["a" /* RegisterPage */]);
    };
    LoginPage.prototype.postReg = function () {
        this.navCtrl.setRoot(__WEBPACK_IMPORTED_MODULE_5__dashboard_dashboard__["a" /* DashboardPage */]);
    };
    LoginPage = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["m" /* Component */])({
            selector: 'page-login',template:/*ion-inline-start:"F:\AppVilo\ALL_PROJECT\Juliia projects\Teory\mobile\MentorCard\src\pages\login\login.html"*/'<!--\n<ion-header>\n\n  <ion-navbar color="dark">\n    <ion-title>\n    <ion-icon name="md-contact"></ion-icon>\n    &nbsp;Sign In</ion-title>\n  </ion-navbar>\n\n</ion-header> -->\n\n\n<ion-content class="bg-img">\n\n    <div class="main-content">\n      <div padding text-center class="container-logo">\n        <img style="width: 25%;" src="assets/imgs/Logo_Web.png">\n      </div>\n      <div padding class="container-bottom">   \n        <div class="errormsg">\n          <div *ngIf="email.errors && email.touched">\n              <p>Username is required.</p>\n          </div>\n          <div *ngIf="password.errors && password.touched">\n              <p>Password is required.</p>\n          </div>\n        </div>\n  \n          <ion-list>\n            <ion-item padding-right>\n              <ion-label>\n                <ion-icon ios="ios-mail" md="md-mail"></ion-icon>\n              </ion-label>\n              <ion-input [(ngModel)]="loginData.email" [formControl]="email" id="email" type="text" required placeholder="Username *"></ion-input>\n            </ion-item>\n            <ion-item>\n              <ion-label>\n                <ion-icon ios="ios-unlock" md="md-unlock"></ion-icon>\n              </ion-label>\n                <ion-input [(ngModel)]="loginData.password" [formControl]="password" id="password" type="{{passwordtype}}" required placeholder="Password *"></ion-input>\n              <button ion-button clear class="eye-icon-btn" type="button" item-right (click)="managePassword()"><ion-icon name="{{passeye}}"></ion-icon></button>\n            </ion-item>\n          </ion-list>\n          \n          <button type="submit" ion-button full color="dark" (click)="moveToHome()">Sign In</button>\n    \n    </div>      \n      <div class="sepretor-or" padding-horizontal style="color: black"> <p style="color: black">Or</p></div>\n  \n  \n      <div padding text-center class="form-bottom-text" ><a href="javascript:void(0);" style="color: black" (click)="moveToForgot()"> Forgot password?</a></div>\n      <div padding text-center class="form-bottom-text">\n        <label style="color: black">Don\'t have an Account? <a href="javascript:void(0);" (click)="moveToReg()" style="color: black">Sign up</a></label>\n      </div>\n  \n      <div padding text-center class="form-bottom-text">\n        <label style="color: black">Choose other <a href="javascript:void(0);" (click)="moveToChoose()" style="color: black">language</a></label>\n      </div>\n  \n    </div>\n  \n  </ion-content> '/*ion-inline-end:"F:\AppVilo\ALL_PROJECT\Juliia projects\Teory\mobile\MentorCard\src\pages\login\login.html"*/,
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1_ionic_angular__["i" /* NavController */], __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["f" /* LoadingController */], __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["j" /* NavParams */], __WEBPACK_IMPORTED_MODULE_2__angular_forms__["a" /* FormBuilder */],
            __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["a" /* AlertController */], __WEBPACK_IMPORTED_MODULE_6__angular_common_http__["a" /* HttpClient */], __WEBPACK_IMPORTED_MODULE_8__providers_database_database__["a" /* DatabaseProvider */]])
    ], LoginPage);
    return LoginPage;
}());

//# sourceMappingURL=login.js.map

/***/ }),

/***/ 506:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return MenuProvider; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__pages_dashboard_dashboard__ = __webpack_require__(63);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__pages_statistics_statistics__ = __webpack_require__(173);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__pages_students_students__ = __webpack_require__(174);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__pages_chapters_chapters__ = __webpack_require__(166);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_5__pages_question_table_question_table__ = __webpack_require__(171);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_6__pages_practice_practice__ = __webpack_require__(169);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_7__pages_mock_test_mock_test__ = __webpack_require__(170);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_8__pages_shop_shop__ = __webpack_require__(172);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_9__pages_system_system__ = __webpack_require__(175);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_10_ionic_angular__ = __webpack_require__(12);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_11__pages_login_login__ = __webpack_require__(50);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_12__pages_user_profile_user_profile__ = __webpack_require__(176);
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};













/*
  Generated class for the MenuProvider provider.

  See https://angular.io/guide/dependency-injection for more info on providers
  and Angular DI.
*/
var MenuProvider = /** @class */ (function () {
    function MenuProvider(alertCtrl) {
        this.alertCtrl = alertCtrl;
        this.dev = [];
        this.devs = {};
    }
    MenuProvider.prototype.presentError = function () {
        var alert = this.alertCtrl.create({
            title: 'Sorry',
            subTitle: 'This is Demo version',
            buttons: ['Ok']
        });
        alert.present();
    };
    MenuProvider.prototype.getSideMenusStude = function () {
        return [{ title: 'Dashboard', component: __WEBPACK_IMPORTED_MODULE_1__pages_dashboard_dashboard__["a" /* DashboardPage */] },
            { title: 'Statistics', component: __WEBPACK_IMPORTED_MODULE_2__pages_statistics_statistics__["a" /* StatisticsPage */] },
            {
                title: 'Learning structure',
                subPages: [{
                        title: 'Chapters',
                        component: __WEBPACK_IMPORTED_MODULE_4__pages_chapters_chapters__["a" /* ChaptersPage */],
                    }, {
                        title: 'Question Table',
                        component: __WEBPACK_IMPORTED_MODULE_5__pages_question_table_question_table__["a" /* QuestionTablePage */],
                    },
                    {
                        title: 'Practice sheets',
                        component: __WEBPACK_IMPORTED_MODULE_6__pages_practice_practice__["a" /* PracticePage */],
                    },
                    {
                        title: 'Mock Test',
                        component: __WEBPACK_IMPORTED_MODULE_7__pages_mock_test_mock_test__["a" /* MockTestPage */],
                    }
                ]
            },
            {
                title: 'Settings',
                subPages: [{
                        title: 'System',
                        component: __WEBPACK_IMPORTED_MODULE_9__pages_system_system__["a" /* SystemPage */],
                    }, {
                        title: 'User',
                        component: __WEBPACK_IMPORTED_MODULE_12__pages_user_profile_user_profile__["a" /* UserProfilePage */],
                    },
                    {
                        title: 'Exit',
                        component: __WEBPACK_IMPORTED_MODULE_11__pages_login_login__["a" /* LoginPage */],
                    }
                ]
            },
        ];
    };
    MenuProvider.prototype.getSideMenus = function () {
        return [{ title: 'Dashboard', component: __WEBPACK_IMPORTED_MODULE_1__pages_dashboard_dashboard__["a" /* DashboardPage */] },
            { title: 'Statistics', component: __WEBPACK_IMPORTED_MODULE_2__pages_statistics_statistics__["a" /* StatisticsPage */] },
            { title: 'Students', component: __WEBPACK_IMPORTED_MODULE_3__pages_students_students__["a" /* StudentsPage */] },
            {
                title: 'Learning structure',
                subPages: [{
                        title: 'Chapters',
                        component: __WEBPACK_IMPORTED_MODULE_4__pages_chapters_chapters__["a" /* ChaptersPage */],
                    }, {
                        title: 'Question Table',
                        component: __WEBPACK_IMPORTED_MODULE_5__pages_question_table_question_table__["a" /* QuestionTablePage */],
                    },
                    {
                        title: 'Practice sheets',
                        component: __WEBPACK_IMPORTED_MODULE_6__pages_practice_practice__["a" /* PracticePage */],
                    },
                    {
                        title: 'Mock Test',
                        component: __WEBPACK_IMPORTED_MODULE_7__pages_mock_test_mock_test__["a" /* MockTestPage */],
                    }
                ]
            },
            { title: 'Shop', component: __WEBPACK_IMPORTED_MODULE_8__pages_shop_shop__["a" /* ShopPage */] },
            {
                title: 'Settings',
                subPages: [{
                        title: 'System',
                        component: __WEBPACK_IMPORTED_MODULE_9__pages_system_system__["a" /* SystemPage */],
                    }, {
                        title: 'User',
                        component: __WEBPACK_IMPORTED_MODULE_12__pages_user_profile_user_profile__["a" /* UserProfilePage */],
                    },
                    {
                        title: 'Exit',
                        component: __WEBPACK_IMPORTED_MODULE_11__pages_login_login__["a" /* LoginPage */],
                    }
                ]
            },
        ];
    };
    MenuProvider = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["A" /* Injectable */])(),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_10_ionic_angular__["a" /* AlertController */]])
    ], MenuProvider);
    return MenuProvider;
}());

//# sourceMappingURL=menu.js.map

/***/ }),

/***/ 507:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return UserPage; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_ionic_angular__ = __webpack_require__(12);
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};


/**
 * Generated class for the UserPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */
var UserPage = /** @class */ (function () {
    function UserPage(navCtrl, navParams) {
        this.navCtrl = navCtrl;
        this.navParams = navParams;
    }
    UserPage.prototype.ionViewDidLoad = function () {
        console.log('ionViewDidLoad UserPage');
    };
    UserPage = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["m" /* Component */])({
            selector: 'page-user',template:/*ion-inline-start:"F:\AppVilo\ALL_PROJECT\Juliia projects\Teory\mobile\MentorCard\src\pages\user\user.html"*/'<!--\n  Generated template for the UserPage page.\n\n  See http://ionicframework.com/docs/components/#navigation for more info on\n  Ionic pages and navigation.\n-->\n<ion-header>\n\n  <ion-navbar>\n    <ion-title>user_page</ion-title>\n  </ion-navbar>\n\n</ion-header>\n\n\n<ion-content padding>\n\n</ion-content>\n'/*ion-inline-end:"F:\AppVilo\ALL_PROJECT\Juliia projects\Teory\mobile\MentorCard\src\pages\user\user.html"*/,
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1_ionic_angular__["i" /* NavController */], __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["j" /* NavParams */]])
    ], UserPage);
    return UserPage;
}());

//# sourceMappingURL=user.js.map

/***/ }),

/***/ 508:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_platform_browser_dynamic__ = __webpack_require__(509);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__app_module__ = __webpack_require__(513);


Object(__WEBPACK_IMPORTED_MODULE_0__angular_platform_browser_dynamic__["a" /* platformBrowserDynamic */])().bootstrapModule(__WEBPACK_IMPORTED_MODULE_1__app_module__["a" /* AppModule */]);
//# sourceMappingURL=main.js.map

/***/ }),

/***/ 513:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return AppModule; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_platform_browser__ = __webpack_require__(46);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_core__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_ionic_angular__ = __webpack_require__(12);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__app_component__ = __webpack_require__(879);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__pages_list_list__ = __webpack_require__(880);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_5__ionic_native_status_bar__ = __webpack_require__(504);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_6__ionic_native_splash_screen__ = __webpack_require__(505);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_7__pages_chapters_chapters__ = __webpack_require__(166);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_8__pages_forgot_forgot__ = __webpack_require__(167);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_9__pages_login_login__ = __webpack_require__(50);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_10__pages_mock_test_mock_test__ = __webpack_require__(170);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_11__pages_practice_practice__ = __webpack_require__(169);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_12__pages_question_table_question_table__ = __webpack_require__(171);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_13__pages_register_register__ = __webpack_require__(168);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_14__pages_shop_shop__ = __webpack_require__(172);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_15__pages_statistics_statistics__ = __webpack_require__(173);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_16__pages_students_students__ = __webpack_require__(174);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_17__pages_system_system__ = __webpack_require__(175);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_18__pages_user_user__ = __webpack_require__(507);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_19__pages_user_profile_user_profile__ = __webpack_require__(176);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_20__pages_choose_lang_choose_lang__ = __webpack_require__(100);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_21__providers_menu_menu__ = __webpack_require__(506);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_22__angular_common_http__ = __webpack_require__(64);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_23__angular_http__ = __webpack_require__(234);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_24__pages_end_test_mock_end_test_mock__ = __webpack_require__(101);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_25__providers_database_database__ = __webpack_require__(65);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_26__pages_dashboard_dashboard__ = __webpack_require__(63);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_27__ionic_storage__ = __webpack_require__(331);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_28__ionic_native_sqlite_porter__ = __webpack_require__(330);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_29__ionic_native_sqlite__ = __webpack_require__(235);
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};






























var AppModule = /** @class */ (function () {
    function AppModule() {
    }
    AppModule = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_1__angular_core__["I" /* NgModule */])({
            declarations: [
                __WEBPACK_IMPORTED_MODULE_3__app_component__["a" /* MyApp */],
                __WEBPACK_IMPORTED_MODULE_4__pages_list_list__["a" /* ListPage */],
                __WEBPACK_IMPORTED_MODULE_7__pages_chapters_chapters__["a" /* ChaptersPage */],
                __WEBPACK_IMPORTED_MODULE_26__pages_dashboard_dashboard__["a" /* DashboardPage */],
                __WEBPACK_IMPORTED_MODULE_8__pages_forgot_forgot__["a" /* ForgotPage */],
                __WEBPACK_IMPORTED_MODULE_9__pages_login_login__["a" /* LoginPage */],
                __WEBPACK_IMPORTED_MODULE_10__pages_mock_test_mock_test__["a" /* MockTestPage */],
                __WEBPACK_IMPORTED_MODULE_11__pages_practice_practice__["a" /* PracticePage */],
                __WEBPACK_IMPORTED_MODULE_12__pages_question_table_question_table__["a" /* QuestionTablePage */],
                __WEBPACK_IMPORTED_MODULE_13__pages_register_register__["a" /* RegisterPage */],
                __WEBPACK_IMPORTED_MODULE_14__pages_shop_shop__["a" /* ShopPage */],
                __WEBPACK_IMPORTED_MODULE_15__pages_statistics_statistics__["a" /* StatisticsPage */],
                __WEBPACK_IMPORTED_MODULE_16__pages_students_students__["a" /* StudentsPage */],
                __WEBPACK_IMPORTED_MODULE_17__pages_system_system__["a" /* SystemPage */],
                __WEBPACK_IMPORTED_MODULE_18__pages_user_user__["a" /* UserPage */],
                __WEBPACK_IMPORTED_MODULE_24__pages_end_test_mock_end_test_mock__["a" /* EndTestMockPage */],
                __WEBPACK_IMPORTED_MODULE_19__pages_user_profile_user_profile__["a" /* UserProfilePage */],
                __WEBPACK_IMPORTED_MODULE_20__pages_choose_lang_choose_lang__["a" /* ChooseLangPage */]
            ],
            imports: [
                __WEBPACK_IMPORTED_MODULE_0__angular_platform_browser__["a" /* BrowserModule */],
                __WEBPACK_IMPORTED_MODULE_23__angular_http__["b" /* HttpModule */],
                __WEBPACK_IMPORTED_MODULE_22__angular_common_http__["b" /* HttpClientModule */],
                __WEBPACK_IMPORTED_MODULE_27__ionic_storage__["a" /* IonicStorageModule */].forRoot(),
                __WEBPACK_IMPORTED_MODULE_2_ionic_angular__["d" /* IonicModule */].forRoot(__WEBPACK_IMPORTED_MODULE_3__app_component__["a" /* MyApp */], {}, {
                    links: [
                        { loadChildren: '../pages/chapters/chapters.module#ChaptersPageModule', name: 'ChaptersPage', segment: 'chapters', priority: 'low', defaultHistory: [] },
                        { loadChildren: '../pages/choose-lang/choose-lang.module#ChooseLangPageModule', name: 'ChooseLangPage', segment: 'choose-lang', priority: 'low', defaultHistory: [] },
                        { loadChildren: '../pages/end-test-mock/end-test-mock.module#EndTestMockPageModule', name: 'EndTestMockPage', segment: 'end-test-mock', priority: 'low', defaultHistory: [] },
                        { loadChildren: '../pages/forgot/forgot.module#ForgotPageModule', name: 'ForgotPage', segment: 'forgot', priority: 'low', defaultHistory: [] },
                        { loadChildren: '../pages/login/login.module#LoginPageModule', name: 'LoginPage', segment: 'login', priority: 'low', defaultHistory: [] },
                        { loadChildren: '../pages/practice/practice.module#PracticePageModule', name: 'PracticePage', segment: 'practice', priority: 'low', defaultHistory: [] },
                        { loadChildren: '../pages/mock-test/mock-test.module#MockTestPageModule', name: 'MockTestPage', segment: 'mock-test', priority: 'low', defaultHistory: [] },
                        { loadChildren: '../pages/question-table/question-table.module#QuestionTablePageModule', name: 'QuestionTablePage', segment: 'question-table', priority: 'low', defaultHistory: [] },
                        { loadChildren: '../pages/register/register.module#RegisterPageModule', name: 'RegisterPage', segment: 'register', priority: 'low', defaultHistory: [] },
                        { loadChildren: '../pages/shop/shop.module#ShopPageModule', name: 'ShopPage', segment: 'shop', priority: 'low', defaultHistory: [] },
                        { loadChildren: '../pages/statistics/statistics.module#StatisticsPageModule', name: 'StatisticsPage', segment: 'statistics', priority: 'low', defaultHistory: [] },
                        { loadChildren: '../pages/students/students.module#StudentsPageModule', name: 'StudentsPage', segment: 'students', priority: 'low', defaultHistory: [] },
                        { loadChildren: '../pages/system/system.module#SystemPageModule', name: 'SystemPage', segment: 'system', priority: 'low', defaultHistory: [] },
                        { loadChildren: '../pages/user-profile/user-profile.module#UserProfilePageModule', name: 'UserProfilePage', segment: 'user-profile', priority: 'low', defaultHistory: [] },
                        { loadChildren: '../pages/user/user.module#UserPageModule', name: 'UserPage', segment: 'user', priority: 'low', defaultHistory: [] }
                    ]
                })
            ],
            bootstrap: [__WEBPACK_IMPORTED_MODULE_2_ionic_angular__["b" /* IonicApp */]],
            entryComponents: [
                __WEBPACK_IMPORTED_MODULE_3__app_component__["a" /* MyApp */],
                __WEBPACK_IMPORTED_MODULE_4__pages_list_list__["a" /* ListPage */],
                __WEBPACK_IMPORTED_MODULE_7__pages_chapters_chapters__["a" /* ChaptersPage */],
                __WEBPACK_IMPORTED_MODULE_26__pages_dashboard_dashboard__["a" /* DashboardPage */],
                __WEBPACK_IMPORTED_MODULE_8__pages_forgot_forgot__["a" /* ForgotPage */],
                __WEBPACK_IMPORTED_MODULE_24__pages_end_test_mock_end_test_mock__["a" /* EndTestMockPage */],
                __WEBPACK_IMPORTED_MODULE_9__pages_login_login__["a" /* LoginPage */],
                __WEBPACK_IMPORTED_MODULE_10__pages_mock_test_mock_test__["a" /* MockTestPage */],
                __WEBPACK_IMPORTED_MODULE_11__pages_practice_practice__["a" /* PracticePage */],
                __WEBPACK_IMPORTED_MODULE_12__pages_question_table_question_table__["a" /* QuestionTablePage */],
                __WEBPACK_IMPORTED_MODULE_13__pages_register_register__["a" /* RegisterPage */],
                __WEBPACK_IMPORTED_MODULE_14__pages_shop_shop__["a" /* ShopPage */],
                __WEBPACK_IMPORTED_MODULE_15__pages_statistics_statistics__["a" /* StatisticsPage */],
                __WEBPACK_IMPORTED_MODULE_16__pages_students_students__["a" /* StudentsPage */],
                __WEBPACK_IMPORTED_MODULE_17__pages_system_system__["a" /* SystemPage */],
                __WEBPACK_IMPORTED_MODULE_18__pages_user_user__["a" /* UserPage */],
                __WEBPACK_IMPORTED_MODULE_19__pages_user_profile_user_profile__["a" /* UserProfilePage */],
                __WEBPACK_IMPORTED_MODULE_20__pages_choose_lang_choose_lang__["a" /* ChooseLangPage */]
            ],
            providers: [
                __WEBPACK_IMPORTED_MODULE_5__ionic_native_status_bar__["a" /* StatusBar */],
                __WEBPACK_IMPORTED_MODULE_6__ionic_native_splash_screen__["a" /* SplashScreen */],
                { provide: __WEBPACK_IMPORTED_MODULE_1__angular_core__["u" /* ErrorHandler */], useClass: __WEBPACK_IMPORTED_MODULE_2_ionic_angular__["c" /* IonicErrorHandler */] },
                __WEBPACK_IMPORTED_MODULE_21__providers_menu_menu__["a" /* MenuProvider */],
                __WEBPACK_IMPORTED_MODULE_25__providers_database_database__["a" /* DatabaseProvider */],
                __WEBPACK_IMPORTED_MODULE_28__ionic_native_sqlite_porter__["a" /* SQLitePorter */],
                __WEBPACK_IMPORTED_MODULE_29__ionic_native_sqlite__["a" /* SQLite */],
            ]
        })
    ], AppModule);
    return AppModule;
}());

//# sourceMappingURL=app.module.js.map

/***/ }),

/***/ 63:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return DashboardPage; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_ionic_angular__ = __webpack_require__(12);
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};


var DashboardPage = /** @class */ (function () {
    function DashboardPage(navCtrl, navParams) {
        this.navCtrl = navCtrl;
        this.navParams = navParams;
    }
    DashboardPage = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["m" /* Component */])({
            selector: 'page-dashboard',template:/*ion-inline-start:"F:\AppVilo\ALL_PROJECT\Juliia projects\Teory\mobile\MentorCard\src\pages\dashboard\dashboard.html"*/'<!--\n  Generated template for the DashboardPage page.\n\n  See http://ionicframework.com/docs/components/#navigation for more info on\n  Ionic pages and navigation.\n-->\n<ion-header>\n\n  <ion-navbar>\n      <button ion-button menuToggle>\n          <ion-icon name="menu"></ion-icon>\n        </button>\n    <ion-title>Dashboard</ion-title>\n  </ion-navbar>\n\n</ion-header>\n\n\n<ion-content >\n\n  <ion-card  >\n    <ion-item class= "first">\n      <ion-avatar item-start>\n          <img src="assets/imgs/close.png">\n      </ion-avatar>\n      <h2 class="text-wt">PRACTICE SHEETS</h2>\n      <h3 class="text-wt">0% made</h3>\n      <p class="text-wt">November 5, 1955</p>\n    </ion-item>\n  </ion-card>\n\n  <ion-card >\n    <ion-item class= "second">\n      <ion-avatar item-start>\n          <img src="assets/imgs/check-mark.png">\n      </ion-avatar>\n      <h2 class="text-wt">MOCK TEST</h2>\n      <h3 class="text-wt">0 of 920 done</h3>\n      <p class="text-wt">November 5, 1955</p>\n    </ion-item>\n  </ion-card>\n\n  <ion-card >\n\n      <ion-card-header class="title_class">\n          Schools Information\n        </ion-card-header>\n  <ion-item>\n      <ion-icon name="ios-person" ></ion-icon>\n      <ion-label>\n        <p>Education</p>\n        <h2>reseller - vlad evtushenko</h2>\n      </ion-label>\n    </ion-item>\n    <ion-item>\n      <ion-icon name="mail" ></ion-icon>\n      <ion-label>\n        <p>Location</p>\n        <h2>kaha</h2>\n      </ion-label>\n    </ion-item>\n    <ion-item>\n        <ion-icon name="mail" ></ion-icon>\n        <ion-label>\n          <p>School Skills</p>\n          <ion-badge item-end>Basic</ion-badge>\n          <ion-badge item-end>B-Cars</ion-badge>\n          <ion-badge item-end>A-Motorcycle</ion-badge><br>\n          <ion-badge item-end>C-Trucks</ion-badge>\n          <ion-badge item-end>CE Trucks with Trailer</ion-badge><br>\n          <ion-badge item-end>Mofa</ion-badge>\n          <ion-badge item-end>DE Bus with trailers</ion-badge><br>\n          <ion-badge item-end>D- Bus</ion-badge>\n          <ion-badge item-end>A,A1,A2</ion-badge> \n          <ion-badge item-end>T,L</ion-badge><br>\n          <ion-badge item-end>C1,D1</ion-badge>\n          <ion-badge item-end>C1E,D1E</ion-badge>\n        </ion-label>\n      </ion-item>\n\n      <ion-item>\n          <ion-icon name="mail" ></ion-icon>\n          <ion-label>\n            <p>Email</p>\n            <h2>vlad_sch2ool@gmail.com</h2>\n          </ion-label>\n        </ion-item>\n\n      </ion-card>\n\n</ion-content>\n'/*ion-inline-end:"F:\AppVilo\ALL_PROJECT\Juliia projects\Teory\mobile\MentorCard\src\pages\dashboard\dashboard.html"*/,
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1_ionic_angular__["i" /* NavController */], __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["j" /* NavParams */]])
    ], DashboardPage);
    return DashboardPage;
}());

//# sourceMappingURL=dashboard.js.map

/***/ }),

/***/ 65:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return DatabaseProvider; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_http__ = __webpack_require__(234);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_core__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__ionic_native_sqlite__ = __webpack_require__(235);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3_rxjs_Rx__ = __webpack_require__(538);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3_rxjs_Rx___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_3_rxjs_Rx__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__ionic_native_sqlite_porter__ = __webpack_require__(330);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_5__ionic_storage__ = __webpack_require__(331);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_6_rxjs_add_operator_map__ = __webpack_require__(275);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_6_rxjs_add_operator_map___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_6_rxjs_add_operator_map__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_7_ionic_angular__ = __webpack_require__(12);
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};








/*
  Generated class for the DatabaseProvider provider.

  See https://angular.io/guide/dependency-injection for more info on providers
  and Angular DI.
*/
var DatabaseProvider = /** @class */ (function () {
    function DatabaseProvider(http, sqlitePorter, storage, sqlite, platform) {
        var _this = this;
        this.http = http;
        this.sqlitePorter = sqlitePorter;
        this.storage = storage;
        this.sqlite = sqlite;
        this.platform = platform;
        this.databaseReady = new __WEBPACK_IMPORTED_MODULE_3_rxjs_Rx__["BehaviorSubject"](false);
        this.platform.ready().then(function () {
            _this.sqlite.create({
                name: 'developers.db',
                location: 'default'
            })
                .then(function (db) {
                _this.database = db;
                _this.storage.get('database_filled').then(function (val) {
                    if (val) {
                        _this.databaseReady.next(true);
                    }
                    else {
                        _this.fillDatabase();
                    }
                });
            });
        });
    }
    DatabaseProvider.prototype.fillDatabase = function () {
        var _this = this;
        this.http.get('assets/dumy.sql')
            .map(function (res) { return res.text(); })
            .subscribe(function (sql) {
            _this.sqlitePorter.importSqlToDb(_this.database, sql)
                .then(function (data) {
                _this.databaseReady.next(true);
                _this.storage.set('database_filled', true);
            })
                .catch(function (e) { return console.error(e); });
        });
    };
    DatabaseProvider.prototype.addDeveloper = function (fp_id, user_id) {
        var data = [fp_id, user_id];
        return this.database.executeSql("INSERT INTO user (fp_id,user_id) VALUES (?,?)", data).then(function (res) {
            return res;
        });
    };
    DatabaseProvider.prototype.deleteDrop = function () {
        return this.database.executeSql("DELETE FROM user", []).then(function (res) {
            return res;
        });
    };
    DatabaseProvider.prototype.getUsers = function () {
        return this.database.executeSql("SELECT * FROM user", []).then(function (data) {
            var dev = [];
            if (data.rows.length > 0) {
                for (var i = 0; i < data.rows.length; i++) {
                    dev.push({ fp_id: data.rows.item(i).fp_id, user_id: data.rows.item(i).user_id });
                }
            }
            return dev;
        }, function (err) {
            console.log("Erro", err);
            return [];
        });
    };
    DatabaseProvider.prototype.getUsersTW = function () {
        return this.database.executeSql("SELECT * FROM user", []).then(function (data) {
            var dev = [];
            if (data.rows.length > 0) {
                for (var i = 0; i < data.rows.length; i++) {
                    dev.push({ fp_id: data.rows.item(i).fp_id, user_id: data.rows.item(i).user_id, auth_token_tw: data.rows.item(i).auth_token_tw, oauth_token_secret_tw: data.rows.item(i).oauth_token_secret_tw,
                        user_id_soc_tw: data.rows.item(i).user_id_soc_tw });
                }
            }
            return dev;
        }, function (err) {
            console.log("Erro", err);
            return [];
        });
    };
    DatabaseProvider.prototype.getDatabaseState = function () {
        return this.databaseReady.asObservable();
    };
    DatabaseProvider = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_1__angular_core__["A" /* Injectable */])(),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_0__angular_http__["a" /* Http */], __WEBPACK_IMPORTED_MODULE_4__ionic_native_sqlite_porter__["a" /* SQLitePorter */], __WEBPACK_IMPORTED_MODULE_5__ionic_storage__["b" /* Storage */], __WEBPACK_IMPORTED_MODULE_2__ionic_native_sqlite__["a" /* SQLite */],
            __WEBPACK_IMPORTED_MODULE_7_ionic_angular__["k" /* Platform */]])
    ], DatabaseProvider);
    return DatabaseProvider;
}());

//# sourceMappingURL=database.js.map

/***/ }),

/***/ 843:
/***/ (function(module, exports, __webpack_require__) {

var map = {
	"./af": 342,
	"./af.js": 342,
	"./ar": 343,
	"./ar-dz": 344,
	"./ar-dz.js": 344,
	"./ar-kw": 345,
	"./ar-kw.js": 345,
	"./ar-ly": 346,
	"./ar-ly.js": 346,
	"./ar-ma": 347,
	"./ar-ma.js": 347,
	"./ar-sa": 348,
	"./ar-sa.js": 348,
	"./ar-tn": 349,
	"./ar-tn.js": 349,
	"./ar.js": 343,
	"./az": 350,
	"./az.js": 350,
	"./be": 351,
	"./be.js": 351,
	"./bg": 352,
	"./bg.js": 352,
	"./bm": 353,
	"./bm.js": 353,
	"./bn": 354,
	"./bn.js": 354,
	"./bo": 355,
	"./bo.js": 355,
	"./br": 356,
	"./br.js": 356,
	"./bs": 357,
	"./bs.js": 357,
	"./ca": 358,
	"./ca.js": 358,
	"./cs": 359,
	"./cs.js": 359,
	"./cv": 360,
	"./cv.js": 360,
	"./cy": 361,
	"./cy.js": 361,
	"./da": 362,
	"./da.js": 362,
	"./de": 363,
	"./de-at": 364,
	"./de-at.js": 364,
	"./de-ch": 365,
	"./de-ch.js": 365,
	"./de.js": 363,
	"./dv": 366,
	"./dv.js": 366,
	"./el": 367,
	"./el.js": 367,
	"./en-au": 368,
	"./en-au.js": 368,
	"./en-ca": 369,
	"./en-ca.js": 369,
	"./en-gb": 370,
	"./en-gb.js": 370,
	"./en-ie": 371,
	"./en-ie.js": 371,
	"./en-il": 372,
	"./en-il.js": 372,
	"./en-nz": 373,
	"./en-nz.js": 373,
	"./eo": 374,
	"./eo.js": 374,
	"./es": 375,
	"./es-do": 376,
	"./es-do.js": 376,
	"./es-us": 377,
	"./es-us.js": 377,
	"./es.js": 375,
	"./et": 378,
	"./et.js": 378,
	"./eu": 379,
	"./eu.js": 379,
	"./fa": 380,
	"./fa.js": 380,
	"./fi": 381,
	"./fi.js": 381,
	"./fo": 382,
	"./fo.js": 382,
	"./fr": 383,
	"./fr-ca": 384,
	"./fr-ca.js": 384,
	"./fr-ch": 385,
	"./fr-ch.js": 385,
	"./fr.js": 383,
	"./fy": 386,
	"./fy.js": 386,
	"./gd": 387,
	"./gd.js": 387,
	"./gl": 388,
	"./gl.js": 388,
	"./gom-latn": 389,
	"./gom-latn.js": 389,
	"./gu": 390,
	"./gu.js": 390,
	"./he": 391,
	"./he.js": 391,
	"./hi": 392,
	"./hi.js": 392,
	"./hr": 393,
	"./hr.js": 393,
	"./hu": 394,
	"./hu.js": 394,
	"./hy-am": 395,
	"./hy-am.js": 395,
	"./id": 396,
	"./id.js": 396,
	"./is": 397,
	"./is.js": 397,
	"./it": 398,
	"./it.js": 398,
	"./ja": 399,
	"./ja.js": 399,
	"./jv": 400,
	"./jv.js": 400,
	"./ka": 401,
	"./ka.js": 401,
	"./kk": 402,
	"./kk.js": 402,
	"./km": 403,
	"./km.js": 403,
	"./kn": 404,
	"./kn.js": 404,
	"./ko": 405,
	"./ko.js": 405,
	"./ky": 406,
	"./ky.js": 406,
	"./lb": 407,
	"./lb.js": 407,
	"./lo": 408,
	"./lo.js": 408,
	"./lt": 409,
	"./lt.js": 409,
	"./lv": 410,
	"./lv.js": 410,
	"./me": 411,
	"./me.js": 411,
	"./mi": 412,
	"./mi.js": 412,
	"./mk": 413,
	"./mk.js": 413,
	"./ml": 414,
	"./ml.js": 414,
	"./mn": 415,
	"./mn.js": 415,
	"./mr": 416,
	"./mr.js": 416,
	"./ms": 417,
	"./ms-my": 418,
	"./ms-my.js": 418,
	"./ms.js": 417,
	"./mt": 419,
	"./mt.js": 419,
	"./my": 420,
	"./my.js": 420,
	"./nb": 421,
	"./nb.js": 421,
	"./ne": 422,
	"./ne.js": 422,
	"./nl": 423,
	"./nl-be": 424,
	"./nl-be.js": 424,
	"./nl.js": 423,
	"./nn": 425,
	"./nn.js": 425,
	"./pa-in": 426,
	"./pa-in.js": 426,
	"./pl": 427,
	"./pl.js": 427,
	"./pt": 428,
	"./pt-br": 429,
	"./pt-br.js": 429,
	"./pt.js": 428,
	"./ro": 430,
	"./ro.js": 430,
	"./ru": 431,
	"./ru.js": 431,
	"./sd": 432,
	"./sd.js": 432,
	"./se": 433,
	"./se.js": 433,
	"./si": 434,
	"./si.js": 434,
	"./sk": 435,
	"./sk.js": 435,
	"./sl": 436,
	"./sl.js": 436,
	"./sq": 437,
	"./sq.js": 437,
	"./sr": 438,
	"./sr-cyrl": 439,
	"./sr-cyrl.js": 439,
	"./sr.js": 438,
	"./ss": 440,
	"./ss.js": 440,
	"./sv": 441,
	"./sv.js": 441,
	"./sw": 442,
	"./sw.js": 442,
	"./ta": 443,
	"./ta.js": 443,
	"./te": 444,
	"./te.js": 444,
	"./tet": 445,
	"./tet.js": 445,
	"./tg": 446,
	"./tg.js": 446,
	"./th": 447,
	"./th.js": 447,
	"./tl-ph": 448,
	"./tl-ph.js": 448,
	"./tlh": 449,
	"./tlh.js": 449,
	"./tr": 450,
	"./tr.js": 450,
	"./tzl": 451,
	"./tzl.js": 451,
	"./tzm": 452,
	"./tzm-latn": 453,
	"./tzm-latn.js": 453,
	"./tzm.js": 452,
	"./ug-cn": 454,
	"./ug-cn.js": 454,
	"./uk": 455,
	"./uk.js": 455,
	"./ur": 456,
	"./ur.js": 456,
	"./uz": 457,
	"./uz-latn": 458,
	"./uz-latn.js": 458,
	"./uz.js": 457,
	"./vi": 459,
	"./vi.js": 459,
	"./x-pseudo": 460,
	"./x-pseudo.js": 460,
	"./yo": 461,
	"./yo.js": 461,
	"./zh-cn": 462,
	"./zh-cn.js": 462,
	"./zh-hk": 463,
	"./zh-hk.js": 463,
	"./zh-tw": 464,
	"./zh-tw.js": 464
};
function webpackContext(req) {
	return __webpack_require__(webpackContextResolve(req));
};
function webpackContextResolve(req) {
	var id = map[req];
	if(!(id + 1)) // check for number or string
		throw new Error("Cannot find module '" + req + "'.");
	return id;
};
webpackContext.keys = function webpackContextKeys() {
	return Object.keys(map);
};
webpackContext.resolve = webpackContextResolve;
module.exports = webpackContext;
webpackContext.id = 843;

/***/ }),

/***/ 879:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return MyApp; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_ionic_angular__ = __webpack_require__(12);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__ionic_native_status_bar__ = __webpack_require__(504);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__ionic_native_splash_screen__ = __webpack_require__(505);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__providers_menu_menu__ = __webpack_require__(506);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_5__pages_choose_lang_choose_lang__ = __webpack_require__(100);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_6__providers_database_database__ = __webpack_require__(65);
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};




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




var MyApp = /** @class */ (function () {
    function MyApp(platform, statusBar, splashScreen, alertCtrl, menuProvider, menuCtrl, databaseProvider) {
        this.platform = platform;
        this.statusBar = statusBar;
        this.splashScreen = splashScreen;
        this.alertCtrl = alertCtrl;
        this.menuProvider = menuProvider;
        this.menuCtrl = menuCtrl;
        this.databaseProvider = databaseProvider;
        this.rootPage = __WEBPACK_IMPORTED_MODULE_5__pages_choose_lang_choose_lang__["a" /* ChooseLangPage */];
        this.dev = [];
        this.devs = {};
        this.initializeApp();
        // used for an example of ngFor and navigation
    }
    MyApp.prototype.getSideMenuData = function () {
        var _this = this;
        this.databaseProvider.getDatabaseState().subscribe(function (rdy) {
            if (rdy) {
                _this.databaseProvider.getUsers().then(function (data) {
                    _this.devs = data;
                    //  alert( data);
                    if (data[0]['fp_id'] != null) {
                        //  this.loading.dismiss();
                        if (data[0]['fp_id'] == 3) {
                            _this.pages = _this.menuProvider.getSideMenus();
                        }
                        else if (data[0]['fp_id'] == 4) {
                            _this.pages = _this.menuProvider.getSideMenusStude();
                        }
                    }
                    else {
                        _this.pages = _this.menuProvider.getSideMenusStude();
                    }
                }).catch();
            }
        });
    };
    MyApp.prototype.initializeApp = function () {
        var _this = this;
        this.platform.ready().then(function () {
            // Okay, so the platform is ready and our plugins are available.
            // Here you can do any higher level native things you might need.
            _this.statusBar.styleDefault();
            _this.splashScreen.hide();
            _this.getSideMenuData();
        });
    };
    MyApp.prototype.closeMenu = function () {
        var confirm = this.alertCtrl.create({
            title: 'Alert',
            message: 'Dow you want to exit?',
            buttons: [
                {
                    text: 'Yes',
                    handler: function () {
                        console.log('Disagree clicked');
                    }
                },
                {
                    text: 'Cancel',
                    role: 'cancel',
                    handler: function () {
                        console.log('Agree clicked');
                    }
                }
            ]
        });
        confirm.present();
    };
    MyApp.prototype.openPage = function (page, index) {
        // Reset the content nav to have just this page
        // we wouldn't want the back button to show in this scenario
        if (page.component) {
            this.nav.setRoot(page.component);
            this.menuCtrl.close();
        }
        else {
            if (this.selectedMenu) {
                this.selectedMenu = 0;
            }
            else {
                this.selectedMenu = index;
            }
        }
    };
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_8" /* ViewChild */])(__WEBPACK_IMPORTED_MODULE_1_ionic_angular__["h" /* Nav */]),
        __metadata("design:type", __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["h" /* Nav */])
    ], MyApp.prototype, "nav", void 0);
    MyApp = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["m" /* Component */])({template:/*ion-inline-start:"F:\AppVilo\ALL_PROJECT\Juliia projects\Teory\mobile\MentorCard\src\app\app.html"*/'<ion-menu [content]="content">\n  <ion-header>\n    <ion-toolbar>\n      <div padding text-center class="container-logo">\n        <img style="width: 25%;" src="assets/imgs/Logo_Web.png">\n      </div>\n    </ion-toolbar>\n  </ion-header>\n\n  \n  <ion-content>\n    <ion-list>\n      <ion-item ion-item *ngFor="let p of pages;  let i=index" (click)="openPage(p, i);">\n        <ion-row>\n          <!-- Parent Pages  -->\n          <ion-col col-9 class="menu-name">\n            <span ion-text>\n              {{p.title}}\n              <ion-icon [name]="selectedMenu == i? \'arrow-down\' : \'arrow-forward\'" *ngIf="p.subPages" float-right></ion-icon>\n            </span>\n\n            <!-- Child Pages  -->\n            <ion-list no-lines [hidden]="selectedMenu != i">\n              <ion-item no-border *ngFor="let subPage of p.subPages;let i2=index" text-wrap (click)="openPage(subPage)">\n                <ion-row>\n                  <ion-col col-10 class="menu-name"><span ion-text color="color2">&nbsp;{{subPage.title}}</span></ion-col>\n                </ion-row>\n              </ion-item>\n            </ion-list>\n          </ion-col>\n        </ion-row>\n      </ion-item>\n\n    </ion-list>\n  </ion-content>\n\n</ion-menu>\n\n<!-- Disable swipe-to-go-back because it\'s poor UX to combine STGB with side menus -->\n<ion-nav [root]="rootPage" #content swipeBackEnabled="false"></ion-nav>'/*ion-inline-end:"F:\AppVilo\ALL_PROJECT\Juliia projects\Teory\mobile\MentorCard\src\app\app.html"*/
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1_ionic_angular__["k" /* Platform */], __WEBPACK_IMPORTED_MODULE_2__ionic_native_status_bar__["a" /* StatusBar */], __WEBPACK_IMPORTED_MODULE_3__ionic_native_splash_screen__["a" /* SplashScreen */],
            __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["a" /* AlertController */], __WEBPACK_IMPORTED_MODULE_4__providers_menu_menu__["a" /* MenuProvider */],
            __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["g" /* MenuController */], __WEBPACK_IMPORTED_MODULE_6__providers_database_database__["a" /* DatabaseProvider */]])
    ], MyApp);
    return MyApp;
}());

//# sourceMappingURL=app.component.js.map

/***/ }),

/***/ 880:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return ListPage; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_ionic_angular__ = __webpack_require__(12);
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};


var ListPage = /** @class */ (function () {
    function ListPage(navCtrl, navParams) {
        this.navCtrl = navCtrl;
        this.navParams = navParams;
        // If we navigated to this page, we will have an item available as a nav param
        this.selectedItem = navParams.get('item');
        // Let's populate this page with some filler content for funzies
        this.icons = ['flask', 'wifi', 'beer', 'football', 'basketball', 'paper-plane',
            'american-football', 'boat', 'bluetooth', 'build'];
        this.items = [];
        for (var i = 1; i < 11; i++) {
            this.items.push({
                title: 'Item ' + i,
                note: 'This is item #' + i,
                icon: this.icons[Math.floor(Math.random() * this.icons.length)]
            });
        }
    }
    ListPage_1 = ListPage;
    ListPage.prototype.itemTapped = function (event, item) {
        // That's right, we're pushing to ourselves!
        this.navCtrl.push(ListPage_1, {
            item: item
        });
    };
    ListPage = ListPage_1 = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["m" /* Component */])({
            selector: 'page-list',template:/*ion-inline-start:"F:\AppVilo\ALL_PROJECT\Juliia projects\Teory\mobile\MentorCard\src\pages\list\list.html"*/'<ion-header>\n  <ion-navbar>\n    <button ion-button menuToggle>\n      <ion-icon name="menu"></ion-icon>\n    </button>\n    <ion-title>List</ion-title>\n  </ion-navbar>\n</ion-header>\n\n<ion-content>\n  <ion-list>\n    <button ion-item *ngFor="let item of items" (click)="itemTapped($event, item)">\n      <ion-icon [name]="item.icon" item-start></ion-icon>\n      {{item.title}}\n      <div class="item-note" item-end>\n        {{item.note}}\n      </div>\n    </button>\n  </ion-list>\n  <div *ngIf="selectedItem" padding>\n    You navigated here from <b>{{selectedItem.title}}</b>\n  </div>\n</ion-content>\n'/*ion-inline-end:"F:\AppVilo\ALL_PROJECT\Juliia projects\Teory\mobile\MentorCard\src\pages\list\list.html"*/
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1_ionic_angular__["i" /* NavController */], __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["j" /* NavParams */]])
    ], ListPage);
    return ListPage;
    var ListPage_1;
}());

//# sourceMappingURL=list.js.map

/***/ })

},[508]);
//# sourceMappingURL=main.js.map