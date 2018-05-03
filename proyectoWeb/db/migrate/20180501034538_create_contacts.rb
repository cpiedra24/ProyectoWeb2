class CreateContacts < ActiveRecord::Migration[5.1]
  def change
    create_table :contacts do |t|
      t.string :name
      t.string :last_name
      t.string :email
      t.string :phone
      t.string :position
      t.references :client, foreign_key: true

      t.timestamps
    end
  end
end
