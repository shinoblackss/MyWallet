import React from 'react'

const TransferForm = ({form, onChange, onSubmit}) => (
    <form className="form-inline justify-content-center" onSubmit={onSubmit}>
        <div className="form-row align-items-center">
            <div className="col-auto">
                <label className="sr-only">Description</label>
                <input type="text" className="form-control mb-2" id="inlineFormInput" placeholder="Description" name="description" onChange={onChange} defaultValue={form.description}/>
            </div>
            <div className="col-auto">
                <label className="sr-only">Amount</label>
                <div className="input-group mb-2">
                    <div className="input-group-prepend">
                        <div className="input-group-text">$</div>
                    </div>
                    <input type="number" className="form-control" id="inlineFormInputGroup" name="amount" defaultValue={form.amount} onChange={onChange}  autoComplete="off"/>
                </div>
            </div>
            
            <div className="col-auto">
                <button type="submit" className="btn btn-primary mb-2">Add</button>
            </div>
        </div>
    </form>
)

export default TransferForm