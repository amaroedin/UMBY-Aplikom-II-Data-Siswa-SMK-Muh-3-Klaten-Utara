<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%siswa}}".
 *
 * @property integer $id
 * @property string $nis
 * @property string $nisn
 * @property string $nama
 * @property string $jenis_kelamin
 * @property integer $id_ref_agama
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property string $golongan_darah
 * @property string $alamat
 * @property integer $id_desa
 * @property string $alamat_rt
 * @property string $alamat_rw
 * @property string $kode_pos
 * @property string $no_telpon
 * @property string $email
 * @property string $nik
 * @property integer $id_ref_asal_sekolah
 * @property string $nomor_skhun
 * @property string $status_keluarga
 * @property integer $jumlah_saudara
 * @property double $tinggi_badan
 * @property double $berat_badan
 * @property string $status_kps
 * @property string $nomor_kps
 * @property integer $id_orangtua_wali
 * @property integer $id_status_tinggal
 * @property integer $id_ref_jurusan
 * @property string $foto
 * @property integer $id_user
 *
 * @property RefAgama $idRefAgama
 * @property OrangtuaWali $idOrangtuaWali
 * @property User $idUser
 * @property RefJurusan $idRefJurusan
 * @property RefAsalSekolah $idRefAsalSekolah
 * @property Status $idStatusTinggal
 * @property Desa $idDesa
 * @property SiswaMutasi[] $siswaMutasis
 * @property SiswaPresensi[] $siswaPresensis
 */
class Siswa extends \yii\db\ActiveRecord
{
    public $jenis_kelamin_str;
    public $id_provinsi, $id_kabupaten;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%siswa}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nis', 'nisn', 'nama', 'jenis_kelamin', 'id_ref_agama', 'tempat_lahir', 'tanggal_lahir', 'alamat', 'id_desa', 'no_telpon', 'id_ref_asal_sekolah', 'id_orangtua_wali', 'id_status_tinggal', 'id_ref_jurusan', 'foto', 'id_user'], 'required'],
            [['jenis_kelamin', 'golongan_darah', 'status_kps'], 'string'],
            [['id_ref_agama', 'id_desa', 'id_ref_asal_sekolah', 'jumlah_saudara', 'id_orangtua_wali', 'id_status_tinggal', 'id_ref_jurusan', 'id_user'], 'integer'],
            [['tanggal_lahir', 'id_provinsi', 'id_kabupaten'], 'safe'],
            [['tinggi_badan', 'berat_badan'], 'number'],
            [['nis', 'kode_pos'], 'string', 'max' => 8],
            [['nisn', 'nik', 'status_keluarga'], 'string', 'max' => 16],
            [['nama'], 'string', 'max' => 128],
            [['tempat_lahir', 'email'], 'string', 'max' => 64],
            [['alamat'], 'string', 'max' => 200],
            [['alamat_rt', 'alamat_rw'], 'string', 'max' => 4],
            [['no_telpon'], 'string', 'max' => 32],
            [['nomor_skhun'], 'string', 'max' => 10],
            [['nomor_kps'], 'string', 'max' => 20],
            [['foto'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nis' => 'NIS',
            'nisn' => 'NISN',
            'nama' => 'Nama Siswa',
            'jenis_kelamin' => 'Jenis Kelamin',
            'id_ref_agama' => 'Agama',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'golongan_darah' => 'Golongan Darah',
            'alamat' => 'Alamat',
            'id_desa' => 'Desa',
            'alamat_rt' => 'RT',
            'alamat_rw' => 'RW',
            'kode_pos' => 'Kode Pos',
            'no_telpon' => 'No Telpon',
            'email' => 'Email',
            'nik' => 'NIK',
            'id_ref_asal_sekolah' => 'Asal Sekolah',
            'nomor_skhun' => 'Nomor SKHUN',
            'status_keluarga' => 'Status Keluarga',
            'jumlah_saudara' => 'Jumlah Saudara',
            'tinggi_badan' => 'Tinggi Badan',
            'berat_badan' => 'Berat Badan',
            'status_kps' => 'Status KPS',
            'nomor_kps' => 'Nomor KPS',
            'id_orangtua_wali' => 'Orangtua Wali',
            'id_status_tinggal' => 'Status Tinggal',
            'id_ref_jurusan' => 'Jurusan',
            'foto' => 'Foto',
            'id_user' => 'User',
            'id_provinsi' => 'Provinsi',
            'id_kabupaten' => 'Kabupaten',
            'idKecamatan' => 'Kecamatan'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdRefAgama()
    {
        return $this->hasOne(RefAgama::className(), ['id' => 'id_ref_agama']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdOrangtuaWali()
    {
        return $this->hasOne(OrangtuaWali::className(), ['id' => 'id_orangtua_wali']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdRefJurusan()
    {
        return $this->hasOne(RefJurusan::className(), ['id' => 'id_ref_jurusan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdRefAsalSekolah()
    {
        return $this->hasOne(RefAsalSekolah::className(), ['id' => 'id_ref_asal_sekolah']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdStatusTinggal()
    {
        return $this->hasOne(Status::className(), ['id' => 'id_status_tinggal']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDesa()
    {
        return $this->hasOne(Desa::className(), ['id' => 'id_desa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdKecamatan()
    {
        return $this->hasOne(Kecamatan::className(), ['id' => 'id_kecamatan'])->via('idDesa');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdKabupaten()
    {
        return $this->hasOne(Kabupaten::className(), ['id' => 'id_kabupaten'])->via('idKecamatan');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProvinsi()
    {
        return $this->hasOne(Provinsi::className(), ['id' => 'id_provinsi'])->via('idKabupaten');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSiswaMutasis()
    {
        return $this->hasMany(SiswaMutasi::className(), ['id_siswa' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSiswaPresensis()
    {
        return $this->hasMany(SiswaPresensi::className(), ['id_siswa' => 'id']);
    }

    public function afterFind()
    {
        $this->jenis_kelamin_str = $this->jenis_kelamin == "L" ? "Laki - Laki" : "Perempuan";
    }

    public function beforeSave()
    {
        
    }
}
