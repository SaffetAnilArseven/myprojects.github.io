<!DOCTYPE html>
<html > 

    <head>
        <title>AngularJS Çoklu Dosya Yükleme</title>
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" >
        <link rel="stylesheet" href="tasarim.css">
        <script src="http://code.angularjs.org/1.2.0/angular.min.js"></script>
        <script src="dist/angular-file-upload.js"></script>
        <script src="controllers.js"></script>
    </head>
<body id="ng-app" ng-app="app">

<div style="background:#dedede" class="container" ng-controller="AppController" nv-file-drop="" uploader="uploader" filters="queueLimit, customFilter">
<div class="col-md-3">

    <h3>Dosyaları Seç</h3>

    <div ng-show="uploader.isHTML5">
            <div class="well dosya-alan" nv-file-over="" uploader="uploader">
            Dosyaları Buraya Sürükleyin
        </div>
    </div>

    Çoklu Dosya Seçme
    <input type="file" nv-file-select="" uploader="uploader" multiple  /><br>
</div>
<div class="col-md-9" style="margin-bottom: 40px">

        <h3>Yüklenecek Dosyalar</h3>
        <p>Dosya Sayısı: {{ uploader.queue.length }}</p>

        <table class="table">
            <thead>
                <tr>
                    <th width="50%">Dosya Adı</th>
                    <th ng-show="uploader.isHTML5">Dosya Boyutu</th>
                    <th ng-show="uploader.isHTML5">Süreç</th>
                    <th>Durum</th>
                    <th>İşlem</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="item in uploader.queue">
                    <td><strong>{{ item.file.name }}</strong></td>
                    <td ng-show="uploader.isHTML5" nowrap>{{ item.file.size/1024/1024|number:2 }} MB</td>
                    <td ng-show="uploader.isHTML5">
                        <div class="progress" style="margin-bottom: 0;">
                            <div class="progress-bar" role="progressbar" ng-style="{ 'width': item.progress + '%' }"></div>
                        </div>
                    </td>
                    <td class="text-center">
                        <span ng-show="item.isSuccess"><i class="glyphicon glyphicon-ok"></i></span>
                        <span ng-show="item.isCancel"><i class="glyphicon glyphicon-ban-circle"></i></span>
                        <span ng-show="item.isError"><i class="glyphicon glyphicon-remove"></i></span>
                    </td>
                    <td nowrap>
                        <button type="button" class="btn btn-success btn-xs" ng-click="item.upload()" ng-disabled="item.isReady || item.isUploading || item.isSuccess">
                            <span class="glyphicon glyphicon-upload"></span> Yükle
                        </button>
                        <button type="button" class="btn btn-warning btn-xs" ng-click="item.cancel()" ng-disabled="!item.isUploading">
                            <span class="glyphicon glyphicon-ban-circle"></span> İptal
                        </button>
                        <button type="button" class="btn btn-danger btn-xs" ng-click="item.remove()">
                            <span class="glyphicon glyphicon-trash"></span> Vazgeç
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>

        <div>
            <div>
                Yükleme Durumu:
                <div class="progress" style="">
                    <div class="progress-bar" role="progressbar" ng-style="{ 'width': uploader.progress + '%' }"></div>
                </div>
            </div>
            <button type="button" class="btn btn-success btn-s" ng-click="uploader.uploadAll()" ng-disabled="!uploader.getNotUploadedItems().length">
                <span class="glyphicon glyphicon-upload"></span> Hepsini Yükle
            </button>
            <button type="button" class="btn btn-warning btn-s" ng-click="uploader.cancelAll()" ng-disabled="!uploader.isUploading">
                <span class="glyphicon glyphicon-ban-circle"></span> Hepsini İptal Et
            </button>
            <button type="button" class="btn btn-danger btn-s" ng-click="uploader.clearQueue()" ng-disabled="!uploader.queue.length">
                <span class="glyphicon glyphicon-trash"></span> Hepsini Sil
            </button>
        </div>

    </div>
</div>




    </body>
</html>