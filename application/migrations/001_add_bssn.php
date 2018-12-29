<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_bssn extends CI_Migration {

  public function up()
  {
    //=========================================================
    // MAIL TYPE
    //=========================================================
    $this->dbforge->add_field(array(
      'mail_id' => array(
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'mail_type' => array(
        'type' => 'INT',
        'constraint' => 11,
      ),
      'mail_number' => array(
        'type' => 'VARCHAR',
        'constraint' => 100,
        'null' => true
      ),
      'mail_date' => array(
        'type' => 'DATE',
        'null' => TRUE
      ),
      'mail_subject' => array(
        'type' => 'VARCHAR',
        'constraint' => 255,
        'null' => TRUE
      ),
      'deleted' => array(
        'type' => 'INT',
        'constraint' => 1,
        'default' => 1
      ),
      'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
      'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
    ));
    $this->dbforge->add_key('mail_id', TRUE);
    $this->dbforge->create_table('outmail');

    //=========================================================
    // MAIL TYPE
    //=========================================================
    $this->dbforge->add_field(array(
      'id' => array(
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'parent_id' => array(
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'null' => true
      ),
      'name' => array(
        'type' => 'VARCHAR',
        'constraint' => 255,
        'null' => true
      ),
      'export_type' => array(
        'type' => 'VARCHAR',
        'constraint' => 10,
        'null' => TRUE
      ),
      'deleted' => array(
        'type' => 'INT',
        'constraint' => 1,
        'default' => 0
      ),
      'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
      'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
    ));
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table('mail_type');
    $data = array(
      array(
        'id' => '1',
        'name' => 'Surat Keputusan',
        'export_type' => 'word',
        'created_at' => '2018-11-07 08:16:22'
      ),
      array(
        'id' => '2',
        'parent_id' => '1',
        'name' => 'Salinan Surat Keputusan',
        'export_type' => 'word',
        'created_at' => '2018-11-07 08:16:22'
      ),
      array(
        'id' => '3',
        'parent_id' => '1',
        'name' => 'Petikan Surat Keputusan',
        'export_type' => 'word',
        'created_at' => '2018-11-07 08:16:22'
      ),
      array(
        'id' => '4',
        'name' => 'Surat Keputusan Berlampir',
        'export_type' => 'word',
        'created_at' => '2018-11-07 08:16:22'
      ),
      array(
        'id' => '5',
        'parent_id' => '4',
        'name' => 'Salinan Surat Keputusan Berlampir',
        'export_type' => 'word',
        'created_at' => '2018-11-07 08:16:22'
      ),
      array(
        'id' => '6',
        'parent_id' => '4',
        'name' => 'Petikan Surat Keputusan Berlampir',
        'export_type' => 'word',
        'created_at' => '2018-11-07 08:16:22'
      ),
      array(
        'id' => '7',
        'parent_id' => '4',
        'name' => 'Lampiran Surat Keputusan',
        'export_type' => 'excel',
        'created_at' => '2018-11-07 08:16:22'
      ),
      array(
        'id' => '8',
        'parent_id' => '4',
        'name' => 'Salinan Lampiran Surat Keputusan',
        'export_type' => 'excel',
        'created_at' => '2018-11-07 08:16:22'
      ),
      array(
        'id' => '9',
        'parent_id' => '4',
        'name' => 'Petikan Lampiran Surat Keputusan',
        'export_type' => 'excel',
        'created_at' => '2018-11-07 08:16:22'
      ),
      array(
        'id' => '10',
        'name' => 'Surat Perintah 1 Orang',
        'export_type' => 'word',
        'created_at' => '2018-11-07 08:16:22'
      ),
      array(
        'id' => '11',
        'name' => 'Surat Perintah 2 Orang',
        'export_type' => 'word',
        'created_at' => '2018-11-07 08:16:22'
      ),
      array(
        'id' => '12',
        'name' => 'Surat Perintah Berlampiran',
        'export_type' => 'word',
        'created_at' => '2018-11-07 08:16:22'
      ),
      array(
        'id' => '13',
        'parent_id' => '12',
        'name' => 'Lampiran Surat Keputusan',
        'export_type' => 'excel',
        'created_at' => '2018-11-07 08:16:22'
      ),
    );
    //$this->db->insert('user_group', $data); I tried both
    $this->db->insert_batch('mail_type', $data);

    //=========================================================
    // MAIL SECTION
    //=========================================================
    $this->dbforge->add_field(array(
      'id' => array(
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'mail_type' => array(
        'type' => 'INT',
        'constraint' => 11,
        'null' => true
      ),
      'code' => array(
        'type' => 'VARCHAR',
        'constraint' => 255,
        'null' => true
      ),
      'name' => array(
        'type' => 'VARCHAR',
        'constraint' => 255,
        'null' => true
      ),
      'description' => array(
        'type' => 'VARCHAR',
        'constraint' => 255,
        'null' => true
      ),
      'type' => array(
        'type' => 'VARCHAR',
        'constraint' => 255,
        'null' => true
      ),
      'order' => array(
        'type' => 'INT',
        'constraint' => 3,
        'null' => true
      ),
      'deleted' => array(
        'type' => 'INT',
        'constraint' => 1,
        'default' => 0
      ),
      'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
      'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
    ));
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table('mail_section');

    //=========================================================
    // MAIL IMAGE
    //=========================================================
    $this->dbforge->add_field(array(
      'id' => array(
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'mail_id' => array(
        'type' => 'INT',
        'constraint' => 11,
        'null' => true
      ),
      'directory' => array(
        'type' => 'VARCHAR',
        'constraint' => 255,
        'null' => true
      ),
      'page' => array(
        'type' => 'INT',
        'constraint' => 3,
        'null' => true
      ),
      'deleted' => array(
        'type' => 'INT',
        'constraint' => 1,
        'default' => 0
      ),
      'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
      'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
    ));
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table('mail_image');

    //=========================================================
    // MAIL IMAGE
    //=========================================================
    $this->dbforge->add_field(array(
      'id' => array(
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'section_id' => array(
        'type' => 'INT',
        'constraint' => 11,
        'null' => true
      ),
      'mail_id' => array(
        'type' => 'INT',
        'constraint' => 11,
        'null' => true
      ),
      'content' => array(
        'type' => 'VARCHAR',
        'constraint' => 1000,
        'null' => true
      ),
      'order' => array(
        'type' => 'INT',
        'constraint' => 3,
        'null' => true
      ),
      'deleted' => array(
        'type' => 'INT',
        'constraint' => 1,
        'default' => 0
      ),
      'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
      'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
    ));
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table('mail_content');

    //=========================================================
    // USER
    //=========================================================
    $this->dbforge->add_field(array(
      'user_id' => array(
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'user_name' => array(
        'type' => 'VARCHAR',
        'constraint' => 255,
        'null' => true
      ),
      'user_position' => array(
        'type' => 'VARCHAR',
        'constraint' => 255,
        'null' => true
      ),
      'user_functional' => array(
        'type' => 'VARCHAR',
        'constraint' => 255,
        'null' => true
      ),
      'user_rank' => array(
        'type' => 'VARCHAR',
        'constraint' => 255,
        'null' => true
      ),
      'user_nip' => array(
        'type' => 'VARCHAR',
        'constraint' => 255,
        'null' => true
      ),
      'username' => array(
        'type' => 'VARCHAR',
        'constraint' => 255,
        'null' => true
      ),
      'user_password' => array(
        'type' => 'VARCHAR',
        'constraint' => 255,
        'null' => true
      ),
      'user_email' => array(
        'type' => 'VARCHAR',
        'constraint' => 255,
        'null' => true
      ),
      'user_address' => array(
        'type' => 'VARCHAR',
        'constraint' => 255,
        'null' => true
      ),
      'user_education' => array(
        'type' => 'VARCHAR',
        'constraint' => 255,
        'null' => true
      ),
      'user_level' => array(
        'type' => 'INT',
        'constraint' => 1,
        'null' => true,
        'default' => 0
      ),
      'deleted' => array(
        'type' => 'INT',
        'constraint' => 1,
        'default' => 0
      ),
      'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
      'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
    ));
    $this->dbforge->add_key('user_id', TRUE);
    $this->dbforge->create_table('user');
    $data = array(
      array(
        'user_id' => '1',
        'username' => 'admin',
        'user_email' => 'admin@gmail.com',
        'user_name' => 'admin',
        'user_password' => '21232f297a57a5a743894a0e4a801fc3',
        'user_level' => 1,
        'created_at' => '2018-11-07 08:16:22'
      ),
      
    );
    $this->db->insert_batch('user', $data);

    //=========================================================
    // MAIL IMAGE
    //=========================================================
    $this->dbforge->add_field(array(
      'id' => array(
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'rank' => array(
        'type' => 'VARCHAR',
        'constraint' => 255,
        'null' => true
      ),
      'deleted' => array(
        'type' => 'INT',
        'constraint' => 1,
        'default' => 0
      ),
      'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
      'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
    ));
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table('user_rank');

    //=========================================================
    // PENGGUNAAN RUANGAN
    //=========================================================
    $this->dbforge->add_field(array(
      'id' => array(
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'ruangan' => array(
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
      ),
      'tanggal' => array(
        'type' => 'VARCHAR',
        'constraint' => 255,
        'null' => true
      ),
      'tujuan' => array(
        'type' => 'VARCHAR',
        'constraint' => 255,
        'null' => true
      ),
      'peminjam' => array(
        'type' => 'VARCHAR',
        'constraint' => 255,
        'null' => true
      ),
      'telepon' => array(
        'type' => 'VARCHAR',
        'constraint' => 255,
        'null' => true
      ),
      'status' => array(
        'type' => 'INT',
        'constraint' => 1,
        'default' => 0
      ),
      'deleted' => array(
        'type' => 'INT',
        'constraint' => 1,
        'default' => 0
      ),
      'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
      'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
    ));
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table('penggunaan_ruangan');

    $data = array(
      array(
        'id' => '1',
        'rank' => 'Juru Muda (I/a)',
        'created_at' => '2018-11-07 08:16:22'
      ),
      array(
        'id' => '2',
        'rank' => 'Juru Muda Tk.I (I/b)',
        'created_at' => '2018-11-07 08:16:22'
      ),
      array(
        'id' => '3',
        'rank' => 'Juru (I/c)',
        'created_at' => '2018-11-07 08:16:22'
      ),
      array(
        'id' => '4',
        'rank' => 'Juru Tk.I (I/d)',
        'created_at' => '2018-11-07 08:16:22'
      ),
      array(
        'id' => '5',
        'rank' => 'Pengatur Muda (II/a)',
        'created_at' => '2018-11-07 08:16:22'
      ),
      array(
        'id' => '6',
        'rank' => 'Pengatur Muda Tk.I (II/b)',
        'created_at' => '2018-11-07 08:16:22'
      ),
      array(
        'id' => '7',
        'rank' => 'Pengatur (II/c)',
        'created_at' => '2018-11-07 08:16:22'
      ),
      array(
        'id' => '8',
        'rank' => 'Pengatur Tk.I (II/d)',
        'created_at' => '2018-11-07 08:16:22'
      ),
      array(
        'id' => '9',
        'rank' => 'Penata Muda (III/a)',
        'created_at' => '2018-11-07 08:16:22'
      ),
      array(
        'id' => '10',
        'rank' => 'Penata Muda Tk.I (III/b)',
        'created_at' => '2018-11-07 08:16:22'
      ),
      array(
        'id' => '11',
        'rank' => 'Penata (III/c)',
        'created_at' => '2018-11-07 08:16:22'
      ),
      array(
        'id' => '12',
        'rank' => 'Penata Tk.I (III/d)',
        'created_at' => '2018-11-07 08:16:22'
      ),
      array(
        'id' => '13',
        'rank' => 'Pembina (IV/a)',
        'created_at' => '2018-11-07 08:16:22'
      ),
      array(
        'id' => '14',
        'rank' => 'Pembina Tk.I (IV/b)',
        'created_at' => '2018-11-07 08:16:22'
      ),
      array(
        'id' => '15',
        'rank' => 'Pembina Utama Muda (IV/c)',
        'created_at' => '2018-11-07 08:16:22'
      ),
      array(
        'id' => '16',
        'rank' => 'Pembina Utama Madya (IV/d)',
        'created_at' => '2018-11-07 08:16:22'
      ),
      array(
        'id' => '17',
        'rank' => 'Pembina Utama (IV/e)',
        'created_at' => '2018-11-07 08:16:22'
      ),
      array(
        'id' => '18',
        'rank' => 'CPNS (III/b)',
        'created_at' => '2018-11-07 08:16:22'
      ),
    );
    $this->db->insert_batch('user_rank', $data);

    $this->dbforge->add_field(array(
          'id' => array(
              'type' => 'INT',
              'constraint' => 5,
              'unsigned' => TRUE,
              'auto_increment' => TRUE
          ),
          'nama_kegiatan' => array(
              'type' => 'VARCHAR',
              'constraint' => '100',
          ),
          'tanggal' => array(
              'type' => 'datetime',
              'null' => false,
          ),
          'tempat' => array(
              'type' => 'VARCHAR',
              'constraint' => '100',
          ),
          'waktu' => array(
              'type' => 'time',
              'null' => false,
          ),
          'jenis' => array(
              'type' => 'int',
              'constraint' => '2',
              'default' => '1'
          ),
          'created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP',
          'update_at' => array(
              'type' => 'timestamp',
              'null' => false,
              'extra' => 'on update CURRENT_TIMESTAMP'
          ),
          'deleted' => array(
              'type' => 'int',
              'constraint' => '2',
              'null' => false
          )
    ));
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table('agenda');

    $this->dbforge->add_field(array(
      'id' => array(
          'type' => 'INT',
          'constraint' => 5,
          'unsigned' => TRUE,
          'auto_increment' => TRUE
      ),
      'nama_divisi' => array(
          'type' => 'VARCHAR',
          'constraint' => '100',
      ),
      'created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP',
      'update_at' => array(
          'type' => 'timestamp',
          'null' => false,
          'extra' => 'on update CURRENT_TIMESTAMP'
      ),
      'deleted' => array(
          'type' => 'int',
          'constraint' => '2',
          'null' => false
      )
    ));
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table('divisi');

    $data = array(
      array(
        'id' => '1',
        'nama_divisi' => 'Tata Usaha'
      ),
      array(
        'id' => '2',
        'nama_divisi' => 'Rumah Tangga'
      )
    );

    $this->db->insert_batch('divisi', $data);

    $this->dbforge->add_field(array(
      'id' => array(
          'type' => 'INT',
          'constraint' => 5,
          'unsigned' => TRUE,
          'auto_increment' => TRUE
      ),
      'nama_atk' => array(
          'type' => 'VARCHAR',
          'constraint' => '100',
      ),
      'jumlah' => array(
              'type' => 'int',
              'constraint' => '5'
      ),
      'id_permintaan' => array(
          'type' => 'int',
          'constraint' => '5'
      ),
      'created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP',
      'update_at' => array(
          'type' => 'timestamp',
          'null' => false,
          'extra' => 'on update CURRENT_TIMESTAMP'
      ),
      'deleted' => array(
          'type' => 'int',
          'constraint' => '2',
          'null' => false
      )
    ));
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table('atk_diminta');

    $this->dbforge->add_field(array(
      'id' => array(
          'type' => 'INT',
          'constraint' => 5,
          'unsigned' => TRUE,
          'auto_increment' => TRUE
      ),
      'nama' => array(
          'type' => 'VARCHAR',
          'constraint' => '100',
      ),
      'jumlah' => array(
              'type' => 'int',
              'constraint' => '5'
      ),
      'id_barang' => array(
        'type' => 'int',
        'constraint' => '10',
      ),
      'nomor_barang' => array(
              'type' => 'VARCHAR',
              'constraint' => '30',
      ),
      'jenis' => array(
              'type' => 'varchar',
              'constraint' => 20
      ),
      'id_peminjaman' => array(
          'type' => 'int',
          'constraint' => '5'
      ),
      'created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP',
      'update_at' => array(
          'type' => 'timestamp',
          'null' => false,
          'extra' => 'on update CURRENT_TIMESTAMP'
      ),
      'deleted' => array(
          'type' => 'int',
          'constraint' => '2',
          'null' => false
      )
    ));
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table('barang_dipinjam');

    $this->dbforge->add_field(array(
      'id' => array(
              'type' => 'INT',
              'constraint' => '5',
              'unsigned' => TRUE,
              'auto_increment' => TRUE
      ),
      'nomor' => array(
              'type' => 'varchar',
              'constraint' => '10'
      ),
      'nama_barang' => array(
              'type' => 'VARCHAR',
              'constraint' => '100',
      ),
      'jumlah' => array(
              'type' => 'int',
              'constraint' => '5'
      ),
      'tahun_kontrak' => array(
              'type' => 'int',
              'constraint' => '4'
      ),
      'rekanan' => array(
              'type' => 'varchar',
              'constraint' => '100'
      ),
      'status' => array(
          'type' => 'varchar',
          'constraint' => '10',
      ),
      'jenis' => array(
          'type' => 'varchar',
          'constraint' => '10',
      ),
      'created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP',
      'update_at' => array(
              'type' => 'timestamp',
              'null' => false,
              'extra' => 'on update CURRENT_TIMESTAMP'
      ),
      'deleted' => array(
              'type' => 'int',
              'constraint' => '2',
              'null' => false,
              'default' => '0'
      )
    ));
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table('data_bmn');
    $data = array(
      array(
        'id' => '1',
        'nomor' => '12093',
        'nama_barang' => 'Printer HP 112',
        'jumlah' => '5',
        'tahun_kontrak' => '2016',
        'rekanan' => 'PT. Yoi',
        'status' => 'Baik',
        'jenis' => '2'
      ),
      array(
        'id' => '2',
        'nomor' => '97812',
        'nama_barang' => 'Laptop Asus A457',
        'jumlah' => '2',
        'tahun_kontrak' => '2017',
        'rekanan' => 'PT. Agar',
        'status' => 'Baik',
        'jenis' => '1'
      ),
      array(
        'id' => '3',
        'nomor' => '27310',
        'nama_barang' => 'Mobil Agya (B 213 AO)',
        'jumlah' => '1',
        'tahun_kontrak' => '2017',
        'rekanan' => 'PT. Asek',
        'status' => 'Baik',
        'jenis' => '3'
      ),
      array(
        'id' => '4',
        'nomor' => '27110',
        'nama_barang' => 'Mobil Agya (B 1213 EO)',
        'jumlah' => '1',
        'tahun_kontrak' => '2017',
        'rekanan' => 'PT. AsekOy',
        'status' => 'Baik',
        'jenis' => '3'
      ),
    );
    $this->db->insert_batch('data_bmn', $data);
    $this->dbforge->add_field(array(
      'id' => array(
              'type' => 'INT',
              'constraint' => 5,
              'unsigned' => TRUE,
              'auto_increment' => TRUE
      ),
      'nama_barang' => array(
              'type' => 'VARCHAR',
              'constraint' => '100',
      ),
      'divisi' => array(
              'type' => 'varchar',
              'constraint' => 20
      ),
      'tgl_lapor' => array(
              'type' => 'datetime',
              'null' => false
      ),
      'gambar' => array(
        'type' => 'varchar',
        'constraint' => '100',
        'null' => false
      ),
      'tgl_perbaikan' => array(
              'type' => 'datetime',
              'null' => false
      ),
      'keterangan' => array(
          'type' => 'VARCHAR',
          'constraint' => '100',
      ),
      'status' => array(
          'type' => 'int',
          'constraint' => '2',
      ),
      'created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP',
      'update_at' => array(
              'type' => 'timestamp',
              'null' => false,
              'extra' => 'on update CURRENT_TIMESTAMP'
      ),
      'deleted' => array(
              'type' => 'int',
              'constraint' => '2',
              'null' => false
      )
    ));
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table('kerusakan');

    $this->dbforge->add_field(array(
      'id' => array(
              'type' => 'INT',
              'constraint' => 5,
              'unsigned' => TRUE,
              'auto_increment' => TRUE
      ),
      'nama_peminjam' => array(
              'type' => 'VARCHAR',
              'constraint' => '100',
      ),
      'tgl_pinjam' => array(
              'type' => 'datetime',
              'null' => false
      ),
      'tgl_kembali' => array(
              'type' => 'datetime',
              'null' => true
      ),
      'created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP',
      'update_at' => array(
              'type' => 'timestamp',
              'null' => false,
              'extra' => 'on update CURRENT_TIMESTAMP'
      ),
      'deleted' => array(
              'type' => 'int',
              'constraint' => '2',
              'null' => false
      )
    ));
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table('peminjaman');

    $this->dbforge->add_field(array(
      'id' => array(
              'type' => 'INT',
              'constraint' => 5,
              'unsigned' => TRUE,
              'auto_increment' => TRUE
      ),
      'nama' => array(
              'type' => 'VARCHAR',
              'constraint' => '100',
      ),
      'nip' => array(
              'type' => 'varchar',
              'constraint' => '20'
      ),
      'tanggal' => array(
              'type' => 'datetime',
              'null' => false
      ),
      'created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP',
      'update_at' => array(
              'type' => 'timestamp',
              'null' => false,
              'extra' => 'on update CURRENT_TIMESTAMP'
      ),
      'deleted' => array(
              'type' => 'int',
              'constraint' => '2',
              'null' => false
      )
    ));
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table('permintaan_atk');

    $this->dbforge->add_field(array(
      'id' => array(
          'type' => 'INT',
          'constraint' => 5,
          'unsigned' => TRUE,
          'auto_increment' => TRUE
      ),
      'nama_personil' => array(
          'type' => 'VARCHAR',
          'constraint' => '100',
      ),
      'nip' => array(
          'type' => 'varchar',
          'constraint' => '20'
      ),
      'id_agenda'=> array(
          'type' => 'int',
          'constraint' => '5'
      ),
      'id_personil'=> array(
          'type' => 'int',
          'constraint' => '5'
      ),
      'created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP',
      'update_at' => array(
          'type' => 'timestamp',
          'null' => false,
          'extra' => 'on update CURRENT_TIMESTAMP'
      ),
      'deleted' => array(
          'type' => 'int',
          'constraint' => '2',
          'null' => false
      )
    ));
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table('personil_agenda');

    $this->dbforge->add_field(array(
      'id' => array(
          'type' => 'INT',
          'constraint' => 5,
          'unsigned' => TRUE,
          'auto_increment' => TRUE
      ),
      'nama_ruangan' => array(
          'type' => 'VARCHAR',
          'constraint' => '100',
      ),
      'kapasitas' => array(
          'type' => 'int',
          'constraint' => '8',
      ),
      'fasilitas' => array(
          'type' => 'VARCHAR',
          'constraint' => '100',
      ),
      'created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP',
      'update_at' => array(
          'type' => 'timestamp',
          'null' => false,
          'extra' => 'on update CURRENT_TIMESTAMP'
      ),
      'deleted' => array(
          'type' => 'int',
          'constraint' => '2',
          'null' => false
      )
    ));
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table('data_ruangan');

    $this->dbforge->add_field(array(
      'id' => array(
          'type' => 'INT',
          'constraint' => 5,
          'unsigned' => TRUE,
          'auto_increment' => TRUE
      ),
      'nomor' => array(
          'type' => 'VARCHAR',
          'constraint' => '100',
      ),
      'tanggal' => array(
          'type' => 'datetime',
          'null' => false,
      ),
      'perihal' => array(
          'type' => 'VARCHAR',
          'constraint' => '30',
      ),
      'dari' => array(
          'type' => 'VARCHAR',
          'constraint' => '50',
      ),
      'untuk' => array(
          'type' => 'VARCHAR',
          'constraint' => '50',
      ),
      'gambar' => array(
          'type' => 'VARCHAR',
          'constraint' => '100',
      ),
      'isi' => array(
          'type' => 'VARCHAR',
          'constraint' => '500',
      ),
      'created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP',
      'update_at' => array(
          'type' => 'timestamp',
          'null' => false,
          'extra' => 'on update CURRENT_TIMESTAMP'
      ),
      'deleted' => array(
          'type' => 'int',
          'constraint' => '2',
          'null' => false
      )
    ));
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table('inmail');
  }

  public function down()
  {
    $this->dbforge->drop_table('outmail');
    $this->dbforge->drop_table('agenda');
    $this->dbforge->drop_table('divisi');
    $this->dbforge->drop_table('atk_diminta');
    $this->dbforge->drop_table('barang_dipinjam');
    $this->dbforge->drop_table('data_bmn');
    $this->dbforge->drop_table('kerusakan');
    $this->dbforge->drop_table('peminjaman');
    $this->dbforge->drop_table('permintaan_atk');
    $this->dbforge->drop_table('personil_agenda');
    $this->dbforge->drop_table('data_ruangan');
    $this->dbforge->drop_table('outmail');
    $this->dbforge->drop_table('mail_type');
    $this->dbforge->drop_table('mail_section');
    $this->dbforge->drop_table('mail_image');
    $this->dbforge->drop_table('mail_content');
    $this->dbforge->drop_table('user');
    $this->dbforge->drop_table('user_rank');
  }
}
