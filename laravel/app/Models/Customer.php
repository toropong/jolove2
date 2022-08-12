<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use Notifiable;
    //타임스탬프 자동입력
    public $timestamps = false;
    //DB 이름 연동
    protected $table = "customer";
  
    //조회시 제외할 칼럼
    protected $hidden = ['password'];
  
    // 기본키 설정
    // protected $primaryKey = 'c_no';
  
    /*자동 타입변환*/
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];
    public function getAuthPassword(){
      return $this->password; // case sensitive
    }
}
