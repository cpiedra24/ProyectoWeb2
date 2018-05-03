class CreateClients < ActiveRecord::Migration[5.1]
  def change
    create_table :clients do |t|
      t.string :name
      t.string :legal_document
      t.string :web_page
      t.string :adress
      t.string :phone
      t.string :sector

      t.timestamps
    end
  end
end
