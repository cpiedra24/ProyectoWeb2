class CreateUsers < ActiveRecord::Migration[5.1]
  def change
    create_table :users do |t|
      t.string :name
      t.string :last_name
      t.string :username
      t.string :user_type
      t.string :password

      t.timestamps
    end
  end
end
